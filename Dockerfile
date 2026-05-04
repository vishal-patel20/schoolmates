FROM php:8.3-apache

# Use the official PHP Extension Installer to install extensions easily and reliably without compiling from scratch
ADD https://github.com/mlocati/php-extension-installer/releases/latest/download/install-php-extensions /usr/local/bin/

# Install required system packages and PHP extensions
RUN apt-get update && apt-get install -y \
    git \
    curl \
    zip \
    unzip \
    sqlite3 \
    nodejs \
    npm \
    && apt-get clean && rm -rf /var/lib/apt/lists/* \
    && chmod +x /usr/local/bin/install-php-extensions \
    && install-php-extensions pdo_mysql pdo_sqlite mbstring exif pcntl bcmath gd

# Enable Apache mod_rewrite
RUN a2enmod rewrite

# Update Apache DocumentRoot to point to Laravel's public directory
ENV APACHE_DOCUMENT_ROOT /var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# Get latest Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www/html

# Copy existing application directory contents
COPY . /var/www/html

# Since .env is ignored, we need to create one from the example for the build to succeed
RUN cp .env.example .env

# Install application dependencies
RUN composer install --no-interaction --optimize-autoloader --no-dev

# Generate app key (requires .env)
RUN php artisan key:generate

# Build frontend assets
RUN npm install && npm run build

# Set permissions for Laravel
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache /var/www/html/database

# Expose port 80
EXPOSE 80

# Start Apache
CMD ["apache2-foreground"]

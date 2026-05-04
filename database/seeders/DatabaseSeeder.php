<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\Course;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Seed Teachers
        $teacher1 = Teacher::create([
            'name' => 'Aarav Sharma',
            'email' => 'aarav.sharma@school.com',
            'phone' => '98765-43210',
            'subject' => 'Mathematics',
            'qualification' => 'M.Sc. Mathematics',
            'salary' => 60000,
        ]);

        $teacher2 = Teacher::create([
            'name' => 'Priya Patel',
            'email' => 'priya.patel@school.com',
            'phone' => '98765-43211',
            'subject' => 'Physics',
            'qualification' => 'Ph.D. Physics',
            'salary' => 65000,
        ]);

        $teacher3 = Teacher::create([
            'name' => 'Rahul Verma',
            'email' => 'rverma@school.com',
            'phone' => '98765-43212',
            'subject' => 'Literature',
            'qualification' => 'M.A. English',
            'salary' => 58000,
        ]);

        // Seed Courses
        Course::create([
            'name' => 'Calculus I',
            'code' => 'MAT101',
            'description' => 'Introduction to differential and integral calculus.',
            'credits' => 4,
            'teacher_id' => $teacher1->id,
        ]);

        Course::create([
            'name' => 'Classical Mechanics',
            'code' => 'PHY201',
            'description' => 'Study of the motion of bodies under the action of forces.',
            'credits' => 4,
            'teacher_id' => $teacher2->id,
        ]);

        Course::create([
            'name' => 'Modern World Literature',
            'code' => 'LIT301',
            'description' => 'Survey of major literary works from the 20th century.',
            'credits' => 3,
            'teacher_id' => $teacher3->id,
        ]);

        // Seed Students
        Student::create([
            'name' => 'Diya Gupta',
            'email' => 'diya.g@student.school.com',
            'phone' => '98765-54321',
            'date_of_birth' => '2005-04-12',
            'gender' => 'Female',
            'class' => '10-A',
            'address' => '123 MG Road, Mumbai',
        ]);

        Student::create([
            'name' => 'Kabir Singh',
            'email' => 'k.singh@student.school.com',
            'phone' => '98765-54322',
            'date_of_birth' => '2004-11-23',
            'gender' => 'Male',
            'class' => '11-B',
            'address' => '456 Civil Lines, Delhi',
        ]);

        Student::create([
            'name' => 'Ananya Desai',
            'email' => 'adesai@student.school.com',
            'phone' => '98765-54323',
            'date_of_birth' => '2006-02-15',
            'gender' => 'Female',
            'class' => '9-C',
            'address' => '789 Koregaon Park, Pune',
        ]);
        
        Student::create([
            'name' => 'Rohan Joshi',
            'email' => 'rohan.j@student.school.com',
            'phone' => '98765-54324',
            'date_of_birth' => '2005-08-30',
            'gender' => 'Male',
            'class' => '10-A',
            'address' => '321 Jayanagar, Bangalore',
        ]);
        
        Student::create([
            'name' => 'Sneha Reddy',
            'email' => 'sreddy@student.school.com',
            'phone' => '98765-54325',
            'date_of_birth' => '2006-05-18',
            'gender' => 'Female',
            'class' => '9-B',
            'address' => '654 Banjara Hills, Hyderabad',
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Teacher;
use App\Models\Course;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'students' => Student::count(),
            'teachers' => Teacher::count(),
            'courses'  => Course::count(),
        ];

        $recentCourses = Course::latest()->take(5)->get();

        return view('dashboard', compact('stats', 'recentCourses'));
    }
}

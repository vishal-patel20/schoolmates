<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Teacher;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::with('teacher')->latest()->paginate(10);
        return view('courses.index', compact('courses'));
    }

    public function create()
    {
        $teachers = Teacher::orderBy('name')->get();
        return view('courses.create', compact('teachers'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'        => 'required|string|max:255',
            'code'        => 'required|string|max:20|unique:courses,code',
            'description' => 'nullable|string',
            'credits'     => 'required|integer|min:1|max:10',
            'teacher_id'  => 'nullable|exists:teachers,id',
        ]);

        Course::create($validated);
        return redirect()->route('courses.index')->with('success', 'Course added successfully!');
    }

    public function show(Course $course)
    {
        $course->load('teacher');
        return view('courses.show', compact('course'));
    }

    public function edit(Course $course)
    {
        $teachers = Teacher::orderBy('name')->get();
        return view('courses.edit', compact('course', 'teachers'));
    }

    public function update(Request $request, Course $course)
    {
        $validated = $request->validate([
            'name'        => 'required|string|max:255',
            'code'        => 'required|string|max:20|unique:courses,code,' . $course->id,
            'description' => 'nullable|string',
            'credits'     => 'required|integer|min:1|max:10',
            'teacher_id'  => 'nullable|exists:teachers,id',
        ]);

        $course->update($validated);
        return redirect()->route('courses.index')->with('success', 'Course updated successfully!');
    }

    public function destroy(Course $course)
    {
        $course->delete();
        return redirect()->route('courses.index')->with('success', 'Course deleted successfully!');
    }
}

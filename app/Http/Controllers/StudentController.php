<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::latest()->paginate(10);
        return view('students.index', compact('students'));
    }

    public function create()
    {
        return view('students.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'            => 'required|string|max:255',
            'email'           => 'required|email|unique:students,email',
            'phone'           => 'nullable|string|max:20',
            'date_of_birth'   => 'nullable|date',
            'gender'          => 'required|in:Male,Female,Other',
            'class'           => 'nullable|string|max:50',
            'enrollment_date' => 'nullable|date',
            'address'         => 'nullable|string',
        ]);

        Student::create($validated);
        return redirect()->route('students.index')->with('success', 'Student added successfully!');
    }

    public function show(Student $student)
    {
        return view('students.show', compact('student'));
    }

    public function edit(Student $student)
    {
        return view('students.edit', compact('student'));
    }

    public function update(Request $request, Student $student)
    {
        $validated = $request->validate([
            'name'            => 'required|string|max:255',
            'email'           => 'required|email|unique:students,email,' . $student->id,
            'phone'           => 'nullable|string|max:20',
            'date_of_birth'   => 'nullable|date',
            'gender'          => 'required|in:Male,Female,Other',
            'class'           => 'nullable|string|max:50',
            'enrollment_date' => 'nullable|date',
            'address'         => 'nullable|string',
        ]);

        $student->update($validated);
        return redirect()->route('students.index')->with('success', 'Student updated successfully!');
    }

    public function destroy(Student $student)
    {
        $student->delete();
        return redirect()->route('students.index')->with('success', 'Student deleted successfully!');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function index()
    {
        $teachers = Teacher::latest()->paginate(10);
        return view('teachers.index', compact('teachers'));
    }

    public function create()
    {
        return view('teachers.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'          => 'required|string|max:255',
            'email'         => 'required|email|unique:teachers,email',
            'phone'         => 'nullable|string|max:20',
            'subject'       => 'required|string|max:255',
            'qualification' => 'nullable|string|max:255',
            'joining_date'  => 'nullable|date',
            'salary'        => 'nullable|numeric|min:0',
        ]);

        Teacher::create($validated);
        return redirect()->route('teachers.index')->with('success', 'Teacher added successfully!');
    }

    public function show(Teacher $teacher)
    {
        return view('teachers.show', compact('teacher'));
    }

    public function edit(Teacher $teacher)
    {
        return view('teachers.edit', compact('teacher'));
    }

    public function update(Request $request, Teacher $teacher)
    {
        $validated = $request->validate([
            'name'          => 'required|string|max:255',
            'email'         => 'required|email|unique:teachers,email,' . $teacher->id,
            'phone'         => 'nullable|string|max:20',
            'subject'       => 'required|string|max:255',
            'qualification' => 'nullable|string|max:255',
            'joining_date'  => 'nullable|date',
            'salary'        => 'nullable|numeric|min:0',
        ]);

        $teacher->update($validated);
        return redirect()->route('teachers.index')->with('success', 'Teacher updated successfully!');
    }

    public function destroy(Teacher $teacher)
    {
        $teacher->delete();
        return redirect()->route('teachers.index')->with('success', 'Teacher deleted successfully!');
    }
}

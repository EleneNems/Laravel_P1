<?php

namespace App\Http\Controllers;


use App\Models\Student;
use App\Models\Course;
use App\Models\Enrollment;
use Illuminate\Http\Request;


class StudentController extends Controller
{
    public function index()
    {
        $students = Student::orderBy('id', 'desc')->paginate(10);
        return view('index', compact('students'));
    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email',
            'birth_date' => 'required|date',
        ]);

        Student::create($request->all());

        return redirect()->route('students.index')->with('success', 'სტუდენტი წარმატებით დაემატა!');
    }

    public function edit(Student $student)
    {
        return view('edit', compact('student'));
    }

    public function update(Request $request, Student $student)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email,' . $student->id,
            'birth_date' => 'required|date',
        ]);

        $student->update($request->all());

        return redirect()->route('students.index')->with('success', 'სტუდენტის მონაცემები განახლდა!');
    }

    public function destroy(Student $student)
    {
        $student->delete();
        return redirect()->route('students.index')->with('success', 'სტუდენტი წაიშალა.');
    }

    public function enrollments(Student $student)
    {
        $courses = Course::all();
        $enrollments = $student->courses()->withPivot('enrollment_date', 'grade')->get();

        return view('enrollments', compact('student', 'courses', 'enrollments'));
    }
}
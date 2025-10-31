<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;


class CourseController extends Controller
{
public function index()
{
    $courses = Course::orderBy('id', 'desc')->paginate(10);
    return view('courses', compact('courses'));
}

public function create()
{
    $isCourse = true;
    return view('create', compact('isCourse'));
}

public function store(Request $request)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'code' => 'required|string|max:50|unique:courses,code',
        'credits' => 'required|integer|min:1',
    ]);

    Course::create($request->all());

    return redirect()->route('courses.index')->with('success', 'კურსი წარმატებით დაემატა!');
}

public function edit(Course $course)
{
    $isCourse = true;
    return view('edit', compact('course', 'isCourse'));

}

public function update(Request $request, Course $course)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'code' => 'required|string|max:50|unique:courses,code,' . $course->id,
        'credits' => 'required|integer|min:1',
    ]);

    $course->update($request->all());

    return redirect()->route('courses.index')->with('success', 'კურსი განახლდა!');
}

public function destroy(Course $course)
{
    $course->delete();
    return redirect()->route('courses.index')->with('success', 'კურსი წაიშალა!');
}

}

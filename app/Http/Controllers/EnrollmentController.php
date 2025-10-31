<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Enrollment;

class EnrollmentController extends Controller
{
    public function store(Request $request)
{
    $request->validate([
        'student_id' => 'required|exists:students,id',
        'course_id' => 'required|exists:courses,id',
    ]);

    Enrollment::create([
        'student_id' => $request->student_id,
        'course_id' => $request->course_id,
        'enrollment_date' => now(),
    ]);

    return redirect()->back()->with('success', 'სტუდენტი ჩაირიცხა კურსზე.');
}
}

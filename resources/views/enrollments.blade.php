@extends('welcome')

@section('content')
<h2>{{ $student->name }} - კურსებზე რეგისტრაცია</h2>

<h4 class="mt-4">ჩარიცხული კურსები</h4>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>კურსი</th>
            <th>კოდი</th>
            <th>ქულა</th>
            <th>ჩარიცხვის თარიღი</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($enrollments as $course)
            <tr>
                <td>{{ $course->title }}</td>
                <td>{{ $course->code }}</td>
                <td>{{ $course->pivot->grade ?? '-' }}</td>
                <td>{{ $course->pivot->enrollment_date }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

<h4 class="mt-5">ახალი კურსის მინიჭება</h4>
<form method="POST" action="{{ route('enrollments.store') }}">
    @csrf
    <input type="hidden" name="student_id" value="{{ $student->id }}">

    <div class="mb-3">
        <label>აირჩიე კურსი</label>
        <select name="course_id" class="form-control" required>
            <option value="">-- აირჩიე --</option>
            @foreach ($courses as $course)
                <option value="{{ $course->id }}">{{ $course->title }} ({{ $course->code }})</option>
            @endforeach
        </select>
    </div>

    <button type="submit" class="btn btn-primary">ჩარიცხვა</button>
    <a href="{{ route('students.index') }}" class="btn btn-secondary">უკან</a>
</form>
@endsection

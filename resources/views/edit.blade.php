@extends('welcome')

@section('content')
@if (isset($isCourse) && $isCourse)
    <h2>კურსის რედაქტირება</h2>

    <form method="POST" action="{{ route('courses.update', $course) }}">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>დასახელება</label>
            <input type="text" name="title" class="form-control" value="{{ $course->title }}" required>
        </div>

        <div class="mb-3">
            <label>კოდი</label>
            <input type="text" name="code" class="form-control" value="{{ $course->code }}" required>
        </div>

        <div class="mb-3">
            <label>კრედიტები</label>
            <input type="number" name="credits" class="form-control" value="{{ $course->credits }}" required>
        </div>

        <button type="submit" class="btn btn-success">განახლება</button>
        <a href="{{ route('courses.index') }}" class="btn btn-secondary">უკან</a>
    </form>

@else
    <h2>სტუდენტის რედაქტირება</h2>

    <form method="POST" action="{{ route('students.update', $student) }}">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>სახელი</label>
            <input type="text" name="name" class="form-control" value="{{ $student->name }}" required>
        </div>

        <div class="mb-3">
            <label>ელფოსტა</label>
            <input type="email" name="email" class="form-control" value="{{ $student->email }}" required>
        </div>

        <div class="mb-3">
            <label>დაბადების თარიღი</label>
            <input type="date" name="birth_date" class="form-control" value="{{ $student->birth_date }}" required>
        </div>

        <button type="submit" class="btn btn-success">განახლება</button>
        <a href="{{ route('students.index') }}" class="btn btn-secondary">უკან</a>
    </form>
@endif
@endsection

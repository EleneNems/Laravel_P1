@extends('welcome')

@section('content')
@if (isset($isCourse) && $isCourse)
    <h2>ახალი კურსის დამატება</h2>

    <form method="POST" action="{{ route('courses.store') }}">
        @csrf
        <div class="mb-3">
            <label>დასახელება</label>
            <input type="text" name="title" class="form-control" required value="{{ old('title') }}">
        </div>

        <div class="mb-3">
            <label>კოდი</label>
            <input type="text" name="code" class="form-control" required value="{{ old('code') }}">
        </div>

        <div class="mb-3">
            <label>კრედიტები</label>
            <input type="number" name="credits" class="form-control" required value="{{ old('credits') }}">
        </div>

        <button type="submit" class="btn btn-success">შენახვა</button>
        <a href="{{ route('courses.index') }}" class="btn btn-secondary">უკან</a>
    </form>

@else
    <h2>ახალი სტუდენტის დამატება</h2>

    <form method="POST" action="{{ route('students.store') }}">
        @csrf
        <div class="mb-3">
            <label>სახელი</label>
            <input type="text" name="name" class="form-control" required value="{{ old('name') }}">
        </div>

        <div class="mb-3">
            <label>ელფოსტა</label>
            <input type="email" name="email" class="form-control" required value="{{ old('email') }}">
        </div>

        <div class="mb-3">
            <label>დაბადების თარიღი</label>
            <input type="date" name="birth_date" class="form-control" required value="{{ old('birth_date') }}">
        </div>

        <button type="submit" class="btn btn-success">შენახვა</button>
        <a href="{{ route('students.index') }}" class="btn btn-secondary">უკან</a>
    </form>
@endif
@endsection

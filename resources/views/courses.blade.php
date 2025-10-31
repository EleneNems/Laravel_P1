@extends('welcome')

@section('content')
<h2>კურსების სია</h2>

<a href="{{ route('courses.create') }}" class="btn btn-primary mb-3">+ ახალი კურსი</a>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>დასახელება</th>
            <th>კოდი</th>
            <th>კრედიტები</th>
            <th>მოქმედება</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($courses as $course)
            <tr>
                <td>{{ $course->id }}</td>
                <td>{{ $course->title }}</td>
                <td>{{ $course->code }}</td>
                <td>{{ $course->credits }}</td>
                <td>
                    <a href="{{ route('courses.edit', $course) }}" class="btn btn-sm btn-warning">რედაქტირება</a>
                    <form action="{{ route('courses.destroy', $course) }}" method="POST" style="display:inline-block">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger" onclick="return confirm('წავშალოთ კურსი?')">წაშლა</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

{{ $courses->links() }}
@endsection

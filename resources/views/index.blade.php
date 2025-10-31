@extends('welcome')

@section('content')
<h2>სტუდენტების სია</h2>

<a href="{{ route('students.create') }}" class="btn btn-primary mb-3">+ ახალი სტუდენტი</a>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>სახელი</th>
            <th>ელფოსტა</th>
            <th>დაბადების თარიღი</th>
            <th>მოქმედება</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($students as $student)
            <tr>
                <td>{{ $student->id }}</td>
                <td>{{ $student->name }}</td>
                <td>{{ $student->email }}</td>
                <td>{{ $student->birth_date }}</td>
                <td>
                    <a href="{{ route('students.edit', $student) }}" class="btn btn-sm btn-warning">რედაქტირება</a>
                    <a href="{{ route('students.enrollments', $student) }}" class="btn btn-sm btn-info">კურსები</a>
                    <form action="{{ route('students.destroy', $student) }}" method="POST" style="display:inline-block">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger" onclick="return confirm('წავშალოთ სტუდენტი?')">წაშლა</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

{{ $students->links() }}
@endsection

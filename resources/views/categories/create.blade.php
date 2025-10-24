<!DOCTYPE html>
<html>
<head>
    <title>Add Category</title>
</head>
<body>
    <h1>Add a New Category</h1>

    @if (session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    @if ($errors->any())
        <ul style="color: red;">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ route('categories.store') }}" method="POST">
        @csrf
        <label for="name">Category Name:</label><br>
        <input type="text" id="name" name="categoryName" value="{{ old('name') }}"><br><br>
        <button type="submit">Add Category</button>
    </form>
</body>
</html>

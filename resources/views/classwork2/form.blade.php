<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Greeting Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f8;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .form-container {
            background: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
            width: 100%;
            max-width: 400px;
        }

        h2 {
            margin-bottom: 20px;
            color: #333;
            text-align: center;
        }

        input, textarea {
            width: 100%;
            padding: 10px;
            margin: 10px 0 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 12px;
            width: 100%;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        button:hover {
            background-color: #45a049;
        }

        .error {
            color: red;
            font-size: 14px;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>

<div class="form-container">
    <h2>შეავსე ფორმა</h2>

    @if ($errors->any())
        <div class="error">
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif

    <form action="{{ route('greeting.generate') }}" method="POST">


        <input type="text" name="user_name" placeholder="შეიყვანე სახელი" value="{{ old('user_name') }}">

        <input type="text" name="fav_color" placeholder="შეიყვანე საყვარელი ფერი" value="{{ old('fav_color') }}">

        <textarea name="fav_activity" placeholder="რისი გაკეთება გიყვარს ყველაზე მეტად?">{{ old('fav_activity') }}</textarea>

        <button type="submit">გაგზავნა</button>
    </form>
</div>

</body>
</html>

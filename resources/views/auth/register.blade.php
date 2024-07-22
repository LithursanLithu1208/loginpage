<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>register</title>
    <link rel="stylesheet" href="register.css">
</head>
<body>
    @if ($errors->any())
    <ul>
        {!! implode('',$errors->all('<li>:message</li>'))!!}
    </ul>
        
    @endif
    <form method="POST" action="{{ url('/store') }}">
        <h1>Register Form</h1>
        <label for="">Fullname</label>
        <input type="text" name="name">
        <label for="">Email</label>
        <input type="email" name="email">
        <label for="">Password</label>
        <input type="password" name="password" id="">
        <label for="">Confirm Password</label>
        <input type="password" name="password_confirmation" id="">
        <button>Register</button>
        @csrf
    </form>
</body>
</html>
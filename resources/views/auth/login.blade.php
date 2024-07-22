<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
    @if ($errors->any())
    <ul>
        {!! implode('',$errors->all('<li>:message</li>'))!!}
    </ul>
        
    @endif
    <form method="POST" action="{{ url('authenticate') }}">
        <h1>login</h1>
        <label for="">Email</label>
        <input type="email" name="email">
        <label for="">Password</label>
        <input type="password" name="password" id="">
        <button>submit</button>
        <a href="{{ url('register') }}">Forget Password</a>
        @csrf
    </form>
</body>
</html>
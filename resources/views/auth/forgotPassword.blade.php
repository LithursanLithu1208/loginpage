

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>forgotpassword</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
   

    <form method="POST" action="{{ route('forgot.password.post') }}">
       
        @csrf
        <h1>
            @if (Session::has('message'))
            {{Session::get('message')}}
            
            @endif
        </h1>
        <h1>Enter Your Email</h1>
        <label for="">Email</label>
        <input type="email" name="email">
        @if($errors->has('email'))
        {{$errors->first('email')}}
        @endif
        <button>Submit</button>
    </form>
</body>
</html>
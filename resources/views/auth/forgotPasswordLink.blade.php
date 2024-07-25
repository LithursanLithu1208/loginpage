<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>forgotPasswordLink</title>
    {{-- <link rel="stylesheet" href="login.css"> --}}
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

*{
    margin: 0;
    padding: 0;
    box-sizing: 0;
    font-family: "Poppins", sans-serif;
    cursor: pointer;
}
body{
    height: 100vh;
    width: 100%;
    display: flex;
    justify-content: center;
    align-items: center;  
    background-color:rgb(233, 175, 216);
}
form{
    height: 28rem;
    width: 25rem;
    display: flex;
    flex-direction: column;
    background-color: rgba(255,255,255,0.06);
    border-radius: 20px;
    box-shadow: rgba(50, 50, 93, 0.25) 0px 50px 100px -20px, rgba(0, 0, 0, 0.3) 0px 30px 60px -30px, rgba(10, 37, 64, 0.35) 0px -2px 6px 0px inset;
}
h1{
    font-size: 30px;
    text-align: center;
    padding: 10px;
    color: white;
    text-shadow: 2px 2px 4px rgba(0,0,0,.5);
    letter-spacing: 2px;
    opacity: .8;
}
label{
    font-size: 20px;
    color: white;
    opacity: .8;
    margin-left: 10%;
    text-shadow: 2px 2px 4px rgba(0,0,0,.5);
}
input{
    width: 80%;
    margin: 5% auto;
    border: none;
    outline: none;
    border-radius: 3px;
    background: transparent;
    color: white;
    border-bottom: 1px solid white;

}
button{
    width: 50%;
    margin: 3% auto;
    color: white;
    font-size: 20px;
    text-shadow: 2px 2px 4px rgba(255,255,255,0.06);
    opacity: .7;
    padding: 10px 30px;
    border: none;
    outline: none;
    border-radius: 20px;
    background: rgba(255,255,255,0.06);
    box-shadow: rgba(50, 50, 93, 0.25) 0px 50px 100px -20px, rgba(0, 0, 0, 0.3) 0px 30px 60px -30px, rgba(10, 37, 64, 0.35) 0px -2px 6px 0px inset;
}
button:hover{   
    background-color:rgb(235, 24, 172);
}
a{
   text-align: center;
   color: white;
   opacity: .7;
   font-size: 15px;
  text-decoration: none;
}
    </style>
</head>
<body>
    <form method="POST" action="{{ route('reset.password.post') }}">
        @csrf
        <input type="hidden" name="token" value="{{$token}}">
        <h1>Reset Password</h1>
        
        <label for="">Email</label>
        <input type="email" name="email" >

        @if ($errors->has('email'))
        {{$errors->first('email')}}     
        @endif

        <label for="">Password</label>
        <input type="password" name="password" id="password">
        @if ($errors->has('password'))
        {{$errors->first('password')}}
            
        @endif

        <label for="">Confirm Password</label>
        <input type="password" id="password-confirm" name="password_confirmation">

        @if ($errors->has('password_confirmation'))
        {{$errors->first('password_confirmation')}}
            
        @endif
        <button>Register</button>
    </form>
    
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="home.css">
</head>
<body>
    
    <div class="content">
        <h1>Hi {{ auth()->user()->name }}</h1> 
    <a href="{{ url('logout') }}">Logout</a>
    </div>
</body>
</html>

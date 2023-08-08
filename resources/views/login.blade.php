<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h1>Login</h1>
    @if (session('message-login'))
        <p>{{ session('message-login') }}</p>
    @endif
    
    <form action="/magloginako" method="post">

        @csrf
        <label for="">Email:</label>
        <input type="email" name="email">
        @error('email')
            <p>{{ $message }}</p>
        @enderror
        </br>
        <label for="">Password:</label>
        <input type="password" name="password">
        @error('password')
            <p>{{ $message }}</p>
        @enderror
        </br>
        <input type="submit" value="Login">
    </form>

    <a href="/register">Register</a>
</body>

</html>

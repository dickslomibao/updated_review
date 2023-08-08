<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h1>Register</h1>

    <form action="/register" method="post">

        @csrf
        <label for="">Firstname:</label>
        <input type="text" name="firstname">
        @error('firstname')
            <p>{{ $message }}</p>
        @enderror
        </br>


        <label for="">Username:</label>
        <input type="text" name="username">
        @error('username')
            <p>{{ $message }}</p>
        @enderror
        </br>

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

        <input type="submit" value="Register">
    </form>
    <a href="/login">Login</a>
</body>

</html>

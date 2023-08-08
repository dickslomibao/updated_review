<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h1>Hello admin, {{session('user')->firstname}}</h1>
    <h1>Create a user</h1>

    <form action="/admin/create" method="post">

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

        <input type="submit" value="Create user">
    </form>

</body>

</html>

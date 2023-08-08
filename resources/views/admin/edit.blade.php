<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h1>Hello admin, {{ session('user')->firstname }}</h1>
    <h1>Edit a user</h1>

    <form action="/admin/user/update/{{$user->id}}" method="post">
        @csrf
        <label for="">Firstname:</label>
        <input type="text" name="firstname" value="{{$user->firstname}}">
        @error('firstname')
            <p>{{ $message }}</p>
        @enderror
        </br>
        <label for="">Username:</label>
        <input type="text" name="username" value="{{$user->username}}">
        @error('username')
            <p>{{ $message }}</p>
        @enderror
        </br>
        <label for="">Email:</label>
        <input type="email" name="email" value="{{$user->email}}">
        @error('email')
            <p>{{ $message }}</p>
        @enderror
        </br>
        <input type="submit" value="Update user">
    </form>

</body>

</html>

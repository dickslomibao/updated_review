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
    <a href="/admin/create">Create user</a>

    @if (session('message'))
        <h5>{{session('message')}}</h5>

    @endif
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Firtname</th>
                <th>Username</th>
                <th>Email</th>
                <th>Number of vouchers</th>
                <th>Date Created</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $data)
                <tr>
                    <td>{{$data->id}}</td>
                    <td>{{$data->firstname}}</td>
                    <td>{{$data->username}}</td>
                    <td>{{$data->email}}</td>
                    <td>{{$data->count}}</td>
                    <td>{{$data->date_created}}</td>
                    <td>
                        <a href="/admin/user/{{$data->id}}">Delete</a>|<a href="/admin/user/edit/{{$data->id}}">Edit</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
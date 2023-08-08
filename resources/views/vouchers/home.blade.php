<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
    <style>
        .w-5 {
            display: none;
        }
    </style>
</head>

<body>
    <a href="/logout">Logout</a>
    <h1>Hello,{{ session('user')->firstname }} </h1>
    <h1>Hello,{{ session('user')->username }} </h1>
    <h1>Hello,{{ session('user')->email }} </h1>
    @if (session('voucher-error'))
        <h2>{{ session('voucher-error') }}</h2>
    @endif
    <h1>
        <form action="/createToken" method="post">
            @csrf
            <input type="submit" value="Create Token">
        </form>
    </h1>
    <table border="1">
        <thead>
            <tr>
                <th>Code</th>
                <th>Date Created</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($vouchers as $data)
                <tr>
                    <td>{{ $data->code }}</td>
                    <td>{{ $data->date_created }}</td>
                    <td><a href="/view/{{ $data->id }}">View</a>|<a href="/voucher/{{ $data->id }}">Delete</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $vouchers->links() }}
</body>

</html>

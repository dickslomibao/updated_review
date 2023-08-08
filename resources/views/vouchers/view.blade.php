<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>view</title>
</head>

<body>
    <h1>Id: {{ $voucher->id }}</h1>
    <h1>Voucher code: {{ $voucher->code }}</h1>
    <h1>Date created: {{ $voucher->date_created }}</h1>
    <h1>Date updat: {{ $voucher->date_updated }}</h1>
</body>

</html>

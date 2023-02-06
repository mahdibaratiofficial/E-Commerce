<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf_token" content="{{ csrf_token() }}">
    <title>Document</title>
</head>
<body>
    <form action="{{ url('login') }}" method="POST">
        @csrf
        <input type="text" name="name">
        <input type="password" name="password">
        <input type="submit" >
    </form>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Virtual Cliente</title>
    @vite('resources/css/app.css')
</head>
<body>
    
    @include('auth.cliente.includes.aside')
    @include('auth.cliente.includes.navbar')
    @include('auth.cliente.includes.productlist')


</body>
</html>
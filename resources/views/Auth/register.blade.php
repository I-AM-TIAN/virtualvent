<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registro de usuarios corporativos</title>
</head>
<body>
    <h1>
        Registrarse
    </h1>
    <form method="POST" action="{{ route('register.user') }}">
        @csrf
        <label for="username">
            Nombre de usuario
        </label>    
        <input type="text" name="username" id="username">
        @if($errors->has('username'))
            {{$errors->first('username')}}
        @endif
        <label for="password">
            Contraseña
        </label>    
        <input type="password" name="password" id="password">
        @if($errors->has('password'))
            {{$errors->first('password')}}
        @endif
        <label for="passwordconfirm">
           Confirmar Contraseña
        </label>    
        <input type="password" name="passwordconfirm" id="passwordconfirm">
        <button type="submit">
            Registrarse
        </button>
    </form>
</body>
</html>
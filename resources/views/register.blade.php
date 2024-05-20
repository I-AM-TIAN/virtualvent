<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>VirtualVent</title>
  <link rel="stylesheet" type="text/css" href="{{ url('assets/css/register.css')}}" />
</head>
<body>
  <div class="body_div">
    <h2>Bienvenido a VirtualVent</h2>
      <form method="POST" action="{{route('register.client')}}">
        @csrf
        <div class="forminputselec">
          <label>Tipo de documento</label>
          <select name="select_doc" required>
            <option value="0">Seleciona</option>
            <option value="1">Cedula</option>
            <option value="2">Tarjeta de identidad</option>
          </select>
        </div>
        <div class="forminput">
          <label>Número de identificación</label>
          <input class="login_input" type="text" required name="documento" placeholder="Example@correo.com" title="Correo electronico">
        </div>
        <div class="forminput">
          <label>Nombre completo</label>
          <input class="login_input" type="text" requerid name="name">
        </div>
        <div class="forminput">
          <label>Apellido completo</label>
          <input class="login_input" type="text" requerid name="lastname">
        </div>
        <div class="forminput">
          <label>Dirección</label>
          <input class="login_input" type="text" requerid name="address">
        </div>
        <div class="forminput">
          <label>Número de telefono</label>
          <input class="login_input" type="text" requerid name="telefono">
        </div>
        <div class="forminput">
          <label>Correo institucional</label>
          <input class="login_input" type="email" requerid name="email">
        </div>
        <div class="forminput">
          <label>Nombre usuario</label>
          <input class="login_input" type="text" requerid name="username">
        </div>
        <div class="forminput">
          <label>Contraseña</label>
          <input class="login_input" type="password" requerid name="password">
        </div>
        <div class="forminputselec">
          <label>Sexo</label>
          <select name="select_div" >
            <option value="select">Seleciona</option>
            <option value="Femenino">Femenino</option>
            <option value="Masculino">Masculino</option>
          </select>
        </div>
        <div class="forminput">
          <label>Fecha de nacimiento</label>
          <input class="login_input" type="date" requerid name="fechanac">
        </div>
        <input class="login_botom" type="submit" value="Registrar">
      </form>
  </div>
</body>
</html>

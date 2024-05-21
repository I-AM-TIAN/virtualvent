<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>VirtualVent</title>
    <link rel="stylesheet" type="text/css" href="{{ url('assets/css/login.css')}}" />
  </head>
  <body>
    <div class="body_div">
      <h2>Bienvenido a VirtualVent</h2>
      <form method="POST" action="{{route('logear.user')}}">
        @csrf
        <div class="form.input">
          <label>Usuario</label>
          <input
            class="login_input"
            type="text"
            required
            name="user_name"
            id="user_name"
            placeholder="example.example"
            title="usuario"
          />
        </div>
        <div class="form.input">
          <label>Contraseña</label>
          <input class="login_input" type="password" required name="password" id="password" />
        </div>
        <input class="login_botom" type="submit" value="Iniciar sesión" />
      </form>
      <!--
<img src="" alt="Logo" title="Logo pendiente"> -->
      <div class="div_registro">
        <label>¿Aún no tienes cuenta?</label>
        <a href="/registrarse">Registrate</a>
      </div>
    </div>
    <div class="div_virt">
      <h1>VirtualVent</h1>
      <p>
        Una plataforma que te permite adquirir productos de acuerdo a tus
        necesidades.
      </p>
    </div>
  </body>
</html>

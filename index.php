<?php
  session_start();
  if(isset($_SESSION['rol'])){
    switch($_SESSION['rol']){
      case 1:
          header('Location: ./menu_admin.php');
          break;
          case 2:
              header('Location: ./menu_recepcionista.php');
              break;
              case 3:
                  header('Location: ./menu_medico.php');
  }
}
?>
<!DOCTYPE html>
<html lang="en" >
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio | SBD</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fjalla+One&family=Noto+Sans:wght@300;400&family=Open+Sans:wght@300&family=Vollkorn&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" href="img/symbol (1).png">
  </head>
  <body>
    <div id="login-button">
      <img src="img/login-w-icon.png" alt="Icono  de inicio de sesión">
    </div>
    <div id="container">
      <h1>Iniciar sesión</h1>
      <span class="close-btn" title="Close">
        <img src="https://cdn4.iconfinder.com/data/icons/miu/22/circle_close_delete_-128.png">
      </span>
      <img src="img/av1.png" alt="Avatar" class="avatar">
      <form name="contacto" method="post" action="php/IniciarSesion.php">
        <input type="text" autocomplete="off" name="username" placeholder="Nombre de usuario" required>
        <input type="password" autocomplete="off" name="contraseña" placeholder="Contraseña" required>
        <input type="submit" name = "ingresar" class="green" value="Ingresar">
        <input type="reset" name = "limpiar" class="red close-cancel" value="Borrar">
        <div id="remember-container">
          <input type="checkbox" id="checkbox-2-1" class="checkbox" checked="checked"/>
          <span id="remember">Recuérdame</span>
          <span id="forgotten">Contraseña olvidada</span>
        </div>
      </form>
    </div>

    <div id="forgotten-container">
      <h1>Contraseña olvidada</h1>
      <span class="close-btn">
        <img src="https://cdn4.iconfinder.com/data/icons/miu/22/circle_close_delete_-128.png">
      </span>
      <form>
        <input type="email" name="email" placeholder="E-mail">
        <a href="#" class="orange-btn">Obtener nueva contraseña</a>
      </form>
    </div>
    <!-- partial -->
    <script src='https://cdnjs.cloudflare.com/ajax/libs/gsap/1.16.1/TweenMax.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script><script  src="js/script.js"></script>
  </body>
</html>

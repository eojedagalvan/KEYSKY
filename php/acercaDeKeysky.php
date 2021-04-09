<?php
  include 'connect.php';
  session_start();
  error_reporting(0);
  $varsesion = $_SESSION['Nombre'];
  $lugares = "select DISTINCT Ubicación from alojamientos";

  if($varsesion == null || $varsesion = ''){
    echo 'Usted no tiene autorización';
    die();
  }
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Acerca de KEYSKY</title>
    <link rel="shortcut icon" href="../images/KEYSKY.jpg" />
    <link rel="stylesheet" href="../css/acercaDeKeysky.css">
    <script src="https://kit.fontawesome.com/2c36e9b7b1.js"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu&display=swap" rel="stylesheet">
  </head>
  <body>
    <header>
        <input type="checkbox" id="btn-menu" value="">
        <label for="btn-menu" class="icono-menu"><i class="fas fa-bars"></i></label>
        <nav class="menu">
          <img src="../images/KEYSKY 4.jpg" alt="logo">
        <ul>
          <li><a href="inicio.php">Inicio</a></li>
          <li><a href="misReservaciones.php">Mis reservaciones</a></li>
          <li><a href="acercaDeKeysky.php">Acerca de KEYSKY</a></li>
          <li class="drop"><a><?php echo $_SESSION['Nombre'] ; echo " " ;echo $_SESSION['Apellido']?></a>
            <ul>
              <li><a href="miPerfil.php">Mi perfil</a></li>
              <li><a href="misAlojamientos.php">Mis alojamientos</a></li>
              <li><a href="cerrarSesion.php">Cerrar sesión</a></li>
            </ul>
          </li>
        </ul>
      </nav>
    </header>

    <section class="inicio">
      <img id="uno" src="../images/acercaDe/one.jpg" width="1059" height="603">
      <h1 id="text" >KEYSKY</h1>
    </section>

    <section class="who">
      <img id="dos" src="../images/acercaDe/two.jpg">
      <h1>¿Quiénes somos?</h1>
      <p id="somos">
        Somos una compañía dedicada a la oferta de distintos alojamientos
        en donde nuestros usuarios pueden publicar sus propiedades al igual
        que rentar de los demás usuarios.
        <br/> <br/> <br/>
        En KEYSKY estamos comprometidos en brindar un servicio exclusivo
        a nuestros usuarios para que puedan gozar de los inmuebles
        publicados en nuestra plataforma.
      </p>
    </section>

    <footer>
      <p>© 2021 KEYSKY, Inc. All rights reserved</p>
    </footer>
  </body>
</html>

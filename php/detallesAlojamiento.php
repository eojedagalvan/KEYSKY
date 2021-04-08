<?php
  include 'connect.php';
  session_start();
  error_reporting(0);
  $varsesion = $_SESSION['Nombre'];

  if($varsesion == null || $varsesion = ''){
    echo 'Usted no tiene autorización';
    die();
  }
  $id= $_GET['Id'];
  $consulta ="Select * from alojamientos where Id_Alojamiento = $id";
  $resultado = mysqli_query($conexion, $consulta);
  $alojamiento = mysqli_fetch_assoc($resultado);
  $checarfotos = "select * from imagen where Id_Alojamiento = '$id'";
  $resultado = mysqli_query($conexion, $checarfotos);
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title><?php echo $nombre ?></title>
    <link rel="shortcut icon" href="../images/KEYSKY.jpg" />
    <link rel="stylesheet" href="../css/detallesAlojamiento.css">
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
    <section id="primeraSeccion">
      <h1><?php echo $alojamiento["Nombre"] ?></h1>
      <h4><?php echo $alojamiento["Ubicación"] ?></h4>
      <article class="container-slider">
        <div class="slider" id="slider">
        <?php while ($fotos = mysqli_fetch_assoc($resultado)) { ?>
          <div class="slider_section">
          <img src="../images/alojamientos/<?php echo $alojamiento["Nombre"] ?>/<?php echo $fotos["Imagen"] ?>" alt="" class="slider-img">
        </div>
      <?php } ?>
      </div>
      <div class="slider-btn slider-btn-right" id="btn-right">></div>
      <div class="slider-btn slider-btn-left" id="btn-left"><</div>
      </article>
    </section>
  </body>
  <script src="../js/slider.js"></script>
</html>

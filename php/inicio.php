<?php
  session_start();
  error_reporting(0);
  $varsesion = $_SESSION['Nombre'];

  if($varsesion == null || $varsesion = ''){
    echo 'Usted no tiene autorización';
    die();
  }
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="shortcut icon" href="../images/KEYSKY.jpg" />
    <link rel="stylesheet" href="../css/inicio.css">
    <script src="https://kit.fontawesome.com/2c36e9b7b1.js"></script>
<link rel="preconnect" href="https://fonts.gstatic.com">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Ubuntu&display=swap" rel="stylesheet">
    <title>Mi cuenta</title>
  </head>
  <body>
    <header>
        <input type="checkbox" id="btn-menu" value="">
        <label for="btn-menu" class="icono-menu"><i class="fas fa-bars"></i></label>
        <nav class="menu">
          <img src="../images/KEYSKY 4.jpg" alt="logo">
        <ul>
          <li><a href="inicio.php">Inicio</a></li>
          <li><a href="#">Mis reservaciones</a></li>
          <li><a href="#">Acerca de KEYSKY</a></li>
          <li class="drop"><a><?php echo $_SESSION['Nombre'] ; echo " " ;echo $_SESSION['Apellido']?></a>
            <ul>
              <li><a href="#">Mi perfil</a></li>
              <li><a href="">Mis alojamientos</a></li>
              <li><a href="../php/cerrarSesion.php">Cerrar sesión</a></li>
            </ul>
          </li>
        </ul>
      </nav>
    </header>
    <section>
      <div class="slider">
        <ul>
          <li><img src="../images/slider/1.jpg" alt=""></li>
          <li><img src="../images/slider/2.jpg" alt=""></li>
          <li><img src="../images/slider/3.jpg" alt=""></li>
          <li><img src="../images/slider/4.jpg" alt=""></li>
          <li><img src="../images/slider/5.jpg" alt=""></li>
          <li><img src="../images/slider/6.jpg" alt=""></li>
        </ul>
        <div class="fondo">
        </div>
        <div class="slider-text">
          <h2>Bienvenido a</h2>
          <h1>KEYSKY</h1>
        </div>
      </div>
    </section>
    <section class="busqueda">
      <img src="../images/inicio/1.jpg" alt="inicio">
      <form class="" action="index.html" method="post">
        <h1>Busca alojamientos en KEYSKY</h1>
        <p>Descubre alojamientos enteros y habitaciones
           privadas, perfectos para cualquier viaje.</p>
           <label for="ubicacion">Ubicación</label>
             <select class="opciones lugares" name="">
               <option value="">Lugares</option>
                <option value="">Tapalpa</option>
             </select>
          <label for="llegada">Llegada</label>
          <input type="date" name="llegada" value="" class="opciones fecha" min="<?php echo date("Y-m-d");?>">
          <br>
          <label for="salida">Salida</label>
          <br>
          <input type="date" name="salida" value="" class="opciones fecha" min="<?php echo date("Y-m-d");?>">
          <input type="submit" name="" value="Buscar" class="submit">
      </form>
    </section>
  </body>
</html>

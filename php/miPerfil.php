<?php
  include 'connect.php';
  session_start();
  error_reporting(0);
  $varsesion = $_SESSION['Nombre'];
  $consultar = "Select correo, clave, Teléfono  from Usuarios where nombre = '$varsesion'";
  $resultado =  mysqli_query($conexion, $consultar);
  $fila = mysqli_fetch_assoc($resultado);
  $correo = $fila['correo'];
  $clave = $fila['clave'];
  $tel = $fila['Teléfono'];

  if($varsesion == null || $varsesion = ''){
    echo 'Usted no tiene autorización';
    die();
  }
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Mi perfil</title>
    <link rel="shortcut icon" href="../images/KEYSKY.jpg" />
    <link rel="stylesheet" href="../css/miPerfil.css">
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
    <section class="datos">
      <img src="../images/miPerfil/perfil.png" alt="">
        <fieldset>
          <legend>Mis datos personales</legend>
          <form class=""  method="post" id="form-modificar">
          <label for="nombre">Nombre: </label>
          <input type="text" name="nombre" class="campo" value="<?php echo $_SESSION['Nombre'] ?>" required disabled>
          <label for="apellido">Apellido: </label>
          <input type="text" name="apellido" class="campo" value="<?php echo $_SESSION['Apellido'] ?>" required disabled>
          <label for="correo">Correo: </label>
          <input type="email" name="correo" class="campo" value="<?php echo $correo ?>" required disabled>
          <label for="clave">Contraseña: </label>
          <input type="password" name="password" class="campo" value="•	•	•	•	" required disabled>
          <label for="tel">Teléfono: </label>
          <input type="tel" name="Teléfono" class="campo" value="<?php echo $tel ?>" required disabled>
          <button type="submit" name="button" id="modificar">Modificar datos</button>
        </form>
        </fieldset>
    </section>
  </body>
  <script src="../js/validarInfo.js"></script>
</html>

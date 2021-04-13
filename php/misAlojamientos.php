<?php
  include 'connect.php';
  session_start();
  error_reporting(0);
  $varsesion = $_SESSION['Nombre'];

  if($varsesion == null || $varsesion = ''){
    echo 'Usted no tiene autorización';
    die();
  }

  $idUsuario = "Select Id_Usuario from usuarios where Correo = '$_SESSION[Correo]'";
  $consultaUsuario = mysqli_query($conexion, $idUsuario);
  $id = mysqli_fetch_assoc($consultaUsuario);
  $checarOwner = "Select * from alojamientos where Id_Usuario = '$id[Id_Usuario]'";
  $consultaOwner = mysqli_query($conexion, $checarOwner);

  // $owner = mysqli_fetch_assoc($consultaOwner);
  // $insertOwner = "INSERT into duenos (Id_Usuario) values ('$owner[Id_Usuario]')";
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Mis alojamientos</title>
    <link rel="shortcut icon" href="../images/KEYSKY.jpg" />
    <link rel="stylesheet" href="../css/misAlojamientos.css">
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

    <section id="Alojamientos">
      <?php if (mysqli_num_rows($consultaOwner) > 0) {?>
        <h1>TUS ALOJAMIENTOS</h1>
        <?php while ($row = mysqli_fetch_assoc($consultaOwner)) {?>
          <a href="detallesAlojamientoDueño.php?Id=<?php echo $row["Id_Alojamiento"] ?>">
        <section class="alojamiento">
          <img src="../images/alojamientos/<?php echo $row["Nombre"]; ?>/1.jpg" alt="">
          <article class="info">
            <h5><?php echo $row["Ubicación"] ?></h5>
            <h2><?php echo $row["Nombre"] ?></h2>
            <p><?php echo $row["Descripción"] ?></p>
            <h3>$<?php echo $row["Costo"] ?> MXN / noche</h3>
          </article>
        </section>
        </a>
      <?php } ?>

        <section id="boton">
          <a href="nuevoAlojamiento.php"><button type="button" name="button" id="nueva"> + Publicar nueva propiedad</button></a>
        </section>
      <?php }
      else { ?>
        <div class="noAlojamiento">
            <h1 id="tit">No tienes ninguna propiedad registrada</h1>
            <h3>¡Comparte tu propiedad con nuestros usuarios!</h3>
            <a href="nuevoAlojamiento.php"><button type="button" name="button" id="nueva"> + Publicar nueva propiedad</button></a>
        </div>
    <?php }?>

    </section>
  </body>
</html>

<?php
  include 'connect.php';
  session_start();
  error_reporting(0);
  $varsesion = $_SESSION['Nombre'];

  if($varsesion == null || $varsesion = ''){
    echo 'Usted no tiene autorización';
    die();
  }

  $nombre = $conexion->real_escape_string($_POST["nombre"]);
  $ubicacion = $conexion->real_escape_string($_POST["ubicacion"]);
  $costo = $conexion->real_escape_string($_POST["costo"]);
  $descripcion = $conexion->real_escape_string($_POST["descripcion"]);
  $imagenes = $conexion->real_escape_string($_FILES["archivo"]);

  $IdUsuario = "SELECT Id_Usuario from usuarios where correo = '$_SESSION[Correo]'";
  $resultadoUsuario = mysqli_query($conexion, $IdUsuario);
  $id = mysqli_fetch_assoc($resultadoUsuario);

  //Insertar en la tabla de alojamientos
  $insertar =  "INSERT into alojamientos (Nombre, Ubicación, Costo, Descripción, Id_Usuario) values ('$nombre', '$ubicacion', '$costo', '$descripcion','$id[Id_Usuario]')";
  $resultado = mysqli_query($conexion, $insertar);

  //Insertar en tabla dueños
  $consulta = "SELECT Id_Usuario from duenos where Id_Usuario = '$id[Id_Usuario]'";
  $resultadoId = mysqli_query($conexion, $consulta);
  $filas = mysqli_num_rows($resultadoId);
  if($filas == 0) {
    $insertarDueno  = "INSERT into duenos (Id_Usuario) values ('$id[Id_Usuario]')";
    $resultadodueno = mysqli_query($conexion, $insertarDueno);
  }


  //Insertar en tabla imagenes
  $idAlojamiento = "Select Id_Alojamiento from alojamientos where Id_Usuario = 1 order by Id_Alojamiento DESC";
  $resultadoAl = mysqli_query($conexion, $idAlojamiento);
  $idAl = mysqli_fetch_assoc($resultadoAl);

  // $imagenes2 = $conexion->real_escape_string($_FILES["archivo"]["tmp_name"]);
  //
  // for ($i=1; $i <= $imagenes.length; $i++) {
  //   $nombrearchivo = basename($_FILES["archivo"]["name"]);
  //   $directorio="../KEYSKY/images/alojamientos/".$nombre;
  //   if (!file_exists($directorio)) {
  //     mkdir($directorio, 0777, true);
  //   }
  //   move_uploaded_file($imagenes2, $directorio."/".$nombrearchivo);
  // //   $insertarImagenes = "INSERT into imagen (Id_Alojamiento, Imagen) values ('$idAl', '$nombrearchivo')";
  // //   $resultadoImagenes = mysqli_query($conexion, $insertarImagenes);
  // // }

  mysqli_free_result($resultado);
  mysqli_free_result($resultadodueno);
  mysqli_free_result($insertar);
  mysqli_close($conexion);
  // mysqli_free_result($resultadoImagenes);
  // mysqli_free_result($insertarImagenes);
?>

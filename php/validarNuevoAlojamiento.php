<?php
  include 'connect.php';

  $nombre = $conexion->real_escape_string($_POST["nombre"]);
  $ubicacion = $conexion->real_escape_string($_POST["ubicacion"]);
  $costo = $conexion->real_escape_string($_POST["costo"]);
  $descripcion = $conexion->real_escape_string($_POST["descripcion"]);
  $imagenes = $conexion->real_escape_string($_FILES["archivo"]);

  $IdUsuario = "SELECT Id_Usuario from usuarios where correo = $_SESSION['Correo']";
  $resultadoUsuario = mysqli_query($conexion, $IdUsuario);
  $id = mysqli_fetch_assoc($resultadoUsuario);

  $insertar =  "INSERT into alojamientos (Nombre, Ubicación, Costo, Descripción, Id_Usuario) values ('$nombre', '$ubicacion', '$costo', '$descripcion','$id[Id_Usuario]')";

  $resultado = mysqli_query($conexion, $insertar);

  mysqli_free_result($resultado, $insertar);
  mysqli_close($conexion);
?>

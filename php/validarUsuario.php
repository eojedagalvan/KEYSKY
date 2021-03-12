<?php
include 'connect.php';
$correo = $_POST["correo"];
$contraseña = $_POST["pass"];

$resultado = mysqli_query($conexion, $insertar);

if(!$resultado) {
  echo 'Error al registrarse';
} else {
  echo 'Usuario registrado exitosamente';
}

mysqli_close($conexion);

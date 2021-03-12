<?php
include 'connect.php';
$nombre = $_POST["nombre"];
$contraseña = $_POST["contraseña"];

$insertar = "INSERT INTO formulario(Nombre, clave) VALUES ('$nombre', '$contraseña')";

$resultado = mysqli_query($conexion, $insertar);

if(!$resultado) {
  echo 'Error al registrarse';
} else {
  echo 'Usuario registrado exitosamente';
}

mysqli_close($conexion);

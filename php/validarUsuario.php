<?php
include 'connect.php';

$correo = $_POST["correo"];
$clave = $_POST["clave"];

$consulta  = "SELECT * from usuarios where correo = '$correo' and clave = '$clave'";
$resultado = mysqli_query($conexion, $consulta);
$filas = mysqli_num_rows($resultado);

if($filas > 0) {
  // header("location:../html/inicio.html");
  return $resultado;
}
else {
  echo 'Acceso denegado';
}

mysqli_free_result($resultado);
mysqli_close($conexion);

<?php
include 'connect.php';

$correo = $conexion->real_escape_string($_POST["correo"]);
$clave = $conexion->real_escape_string($_POST["clave"]);

$consulta  = "SELECT * from usuarios where correo = '$correo' and clave = '$clave'";

$resultado = mysqli_query($conexion, $consulta);
$filas = mysqli_num_rows($resultado);

if($conexion->error){
  die($conexion->error);
}

if($filas > 0) {
  // echo 'Credenciales correctas';
  // $usuario = "SELECT usuario from usuarios where correo = '$correo' and clave = '$clave'";
  header("Location:../html/inicio.html");
}
else {
  http_response_code(401);
  echo 'Acceso denegado';
}

mysqli_free_result($resultado);
mysqli_close($conexion);

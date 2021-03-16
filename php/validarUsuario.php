<?php
include 'connect.php';
// include '../js/validar.js';
$correo = $_POST["correo"];
$clave = $_POST["clave"];

$consulta  = "SELECT * from usuarios where correo = '$correo' and clave = '$clave'";
$resultado = mysqli_query($conexion, $consulta);
$filas = mysqli_num_rows($resultado);

if($filas > 0) {
  header("location:../html/inicio.html");
}
else {
  echo '<script>';
  echo 'denegarUsuario();';
  echo "</script>";
}

mysqli_free_result($resultado);
mysqli_close($conexion);

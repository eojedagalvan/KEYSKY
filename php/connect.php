<?php
$conexion = mysqli_connect("www.keysky.com", "root", "", "KEYSKY");
if (!$conexion) {
  echo 'Error al conectar a la base de datos';
}
// else {
//   echo 'Conectado a la base de datos';
// }

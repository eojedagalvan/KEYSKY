<?php
  include 'connect.php';
  session_start();
  error_reporting(0);
  $varsesion = $_SESSION['Nombre'];

  if($varsesion == null || $varsesion = ''){
    echo 'Usted no tiene autorización';
    die();
  }
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="shortcut icon" href="../images/KEYSKY.jpg" />
    <title>Búsqueda</title>
  </head>
  <body>

  </body>
</html>

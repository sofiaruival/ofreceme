<?php
include_once("funciones.php");
$id = $GET["id"];
$usuario=busacarPorId($id;)
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <h1>
      <?php $usuario["nombre"] ?><?php $usuario["apellido"] ?>
    </h1>

  </body>
</html>

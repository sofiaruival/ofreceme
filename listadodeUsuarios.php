<?php

  include_once("init.php");
  $usuarios = $db->traerUsuarios();

 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>Inicio</title>
  <link rel="stylesheet" href="css/inicio.css">
  <link rel="stylesheet" href="css/base.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
</head>
  <body>

      <?php include("header.php") ?>

<div class="principal">
    <h1>Mis usuarios</h1>
    <ul>
      <?php foreach ($usuarios as $usuario) : ?>
        <li>
          <a href="detalleUsuario.php?id=<?=$usuario->getId()?>">
          <?php echo $usuario->getNombre() . " " . $usuario->getApellido(); ?>
        </li>
      <?php endforeach; ?>
    </ul>
</div>



  </body>
</html>

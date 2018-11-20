<?php
  include_once("init.php");

  $id = $_GET["id"];

  $usuario = buscarPorID($id);

  $foto = glob("img/" . $usuario["email"] . "*")[0];
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
  <div class="contenedor">
    <?php include("header.php") ?>
    <div class="principal">
      <h1>Bienvenido al perfil de <?=$usuario->getNombre()?></h1>
      <ul>
        <li>Apellido: <?=$usuario->getApellido()?></li>
        <li>Email: <?=$usuario->getEmail()?></li>
      </ul>
      <img width="200" src="<?=$foto?>" alt="">
    </div>
  </div>
</body>
</html>

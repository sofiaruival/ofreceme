<?php

require_once("funciones.php");

$errores=[];
$emailDefault="";


if($_POST){

  $errores=validarDatosLogin($_POST);
  $emailDefault = $_POST["email"];

  if(empty($errores)){
    logear($_POST["email"]);

    header('Location: index.php');
    exit;
  }
}
?>



<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/master.css">
    <link rel="stylesheet" href="css/login.css">
    <title>login</title>
  </head>
  <body>

      <header>
        <ul>
          <li>
            <a href="index.php"><img class="logo_corto" src="images/logo.png" alt="logo"></a>
          </li>
          <li>
            <a href="index.php"><img class="logo_largo" src="images/logo_largo.png" alt="logo"></a>
          </li>
          <li>
            <a href="#" class="toggle-nav">
      				<span class="fa fa-bars"></span>
  			    </a>
          </li>
        </ul>
        <nav class="nav-principal">
  				<ul>
            <li><a href="index.php">Inicio</a></li>
            <li><a href="#">Ofertar</a></li>
            <li><a href="#">Ofertas</a></li>
            <li><a href="login.php">Ingresar</a></li>
            <li><a href="registrate.php">Registrate</a></li>
            <li><a href="#">Logout</a></li>
  				</ul>
  			</nav>
      </header>
  <div class="container">
      <section>
        <h1>Ingresar a mi cuenta</h1>

        <button class="facebook" type="submit" name="Facebook">Continuar con Facebook</button>

        <div class="renglonRayas">
          <hr>
          <h2>O ingresar con tu email</h2>
          <hr>
        </div>

        <form id="formulario" class="IngresarDatos" action="login.php" method="post" enctype="multipart/form-data">
          <?php if ( isset($errores["email"]) ) : ?>
            <p class="email">
              <label class="error" for="email"></label>
              <input class="error" type="email" name="email" placeholder="Email" value="">
            </p>
            <p class="mensaje-error">
              <?=$errores["email"]?>
            </p>
          <?php else : ?>
            <p class="email">
              <label class="completar" for="email"></label>
              <input type="email" name="email" placeholder="Email" value="<?=$emailDefault?>">
            </p>
          <?php endif; ?>

          <?php if ( isset($errores["password"]) ) : ?>
            <p class="contraseña">
              <label class="error" for="contraseña"></label>
              <input class="error" type="password" name="password" placeholder="Contraseña" value="" >
            </p>
            <p class="mensaje-error">
              <?=$errores["password"]?>
            </p>
          <?php else : ?>
            <p class="contraseña">
              <label class="completar" for="contraseña"></label>
              <input type="password" name="password" placeholder="Contraseña" value="" >
            </p>
            <?php endif; ?>
        </form>

        <div class="checkbox">
          <div class="recordame">
            <p>
              <label for="recordame"></label>
              <input type="checkbox" name="Recordame" value="recordame">Recordame
            </p>
          </div>
          <div class="olvide">
            <p>
              <a href="#">Olvide mi contraseña</a>
            </p>
          </div>
        </div>

        <button form="formulario" class="Ingresar" type="submit" name="Ingresar">Ingresar</button>

        <div class="cuenta">
          <div class="notenescuenta">
            <p>¿No tenes cuenta?</p>
          </div>
          <div class="registrate">
            <p><a href="#">Registrate</a></p>
          </div>
        </div>
      </section>
    </div>

  </body>
</html>

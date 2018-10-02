<?php

require_once("funciones.php");

//$errores=[];

$nombreDefault="";
$apellidoDefault="";
$emailDefault="";


if($_POST){

  $errores=validarDatosRegistrate($_POST);

  $nombreDefault = $_POST["nombre"];
  $apellidoDefault = $_POST["apellido"];
  $emailDefault = $_POST["email"];



  if(empty($errores)){


    $usuario= armarUsuario();
    $usuario= crearUsuario($usuario);
    $ext=pathinfo($_FILES["avatar"]["name"], PATHINFO_EXTENSION);
    move_uploaded_file($_FILES["avatar"]["tmp_name"], "img/" . trim($_POST["email"]) . "." . $ext);
    header('Location: index.php');
    exit;
  }

  //lo voy a reemplazar para que se marque el error en el lugar que corresponde//
  /*foreach($errores as $error){
    echo $error."<br>";
  }
  */
}
?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/master.css">
    <link rel="stylesheet" href="css/registrate.css">
    <title>registrate</title>
  </head>
  <body>

      <header>
        <ul>
          <li>
            <a href="index.html"><img class="logo_corto" src="images/logo.png" alt="logo"></a>
          </li>
          <li>
            <a href="index.html"><img class="logo_largo" src="images/logo_largo.png" alt="logo"></a>
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
<br>
     <div class="container">
      <section>
        <h1>Registrate</h1>

        <button class="facebook" type="submit" name="Facebook">Continuar con Facebook</button>
        <div class="renglonRayas">
          <hr>
          <h2>O ingresar con tu email</h2>
          <hr>
        </div>

        <form id="formulario" class="IngresarDatos" action="registrate.php" method="post" enctype="multipart/form-data">

          <?php if ( isset($errores["nombre"]) ) : ?>
          <p class="nombre">

            <input class="error" type="text" name="nombre" placeholder="Nombre" value="">
          </p>
          <p class="mensaje-error">
            <?=$errores["nombre"]?>
          </p>
        <?php else : ?>
          <p class="nombre">

            <input type="text" name="nombre" placeholder="Nombre" value="<?=$nombreDefault?>" >
          </p>
        <?php endif; ?>

      <?php if ( isset($errores["apellido"]) ) : ?>
          <p class="apellido">

            <input class="error" type="text" name="apellido" placeholder="Apellido" value="">
          </p>
          <p class="mensaje-error">
            <?=$errores["apellido"]?>
          </p>
        <?php else : ?>
          <p class="apellido">

            <input type="text" name="apellido" placeholder="Apellido" value="<?=$apellidoDefault?>">
          </p>
        <?php endif; ?>

        <?php if ( isset($errores["email"]) ) : ?>
          <p class="email">

            <input class="error" type="email" name="email" placeholder="Email" value="">
          </p>
          <p class="mensaje-error">
            <?=$errores["email"]?>
          </p>
        <?php else : ?>
          <p class="email">

            <input type="email" name="email" placeholder="Email" value="<?=$emailDefault?>">
          </p>
        <?php endif; ?>

        <?php if ( isset($errores["password"]) ) : ?>
          <p class="contraseña">

            <input class="error" type="password" name="password" placeholder="Contraseña" value="" >
          </p>
          <p class="mensaje-error">
            <?=$errores["password"]?>
          </p>
        <?php else : ?>
          <p class="contraseña">

            <input type="password" name="password" placeholder="Contraseña" value="" >
          </p>
          <?php endif; ?>

          <p class="subirFoto">
            <input type="file" name="avatar" placeholder="avatar" >
          </p>
        </form>


        <!--
          TODO: NICE TO HAVE.
        <div class="checkbox">
          <div class="novedades">
            <p>

              <input type="checkbox" name="novedades" value="novedades">Quiero reccibir novedades por email
            </p>
          </div>
        </div> -->

          <div class="terminosYcondiciones">
            <p>
              Ver los <a href="#">Términos y condiciones</a>
            </p>
          </div>

        <button form="formulario" class="registrate" type="submit" name="registrate">Registrate</button>

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

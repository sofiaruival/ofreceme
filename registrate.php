<?php

$usernameDefault="";
$apellidoDefault="";
$emailDefault="";

if($_POST){
  $usernameDefault = $_POST["nombre"];
  include_once("funciones.php");
  $errores=validarDatosRegistrate();
  if(empty($errores)){
    header('Location: index.php');
    exit;
  }
  foreach($errores as $error){
    echo $error."<br>";
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
            <li><a href="index.html">Inicio</a></li>
            <li><a href="#">Ofertar</a></li>
            <li><a href="#">Ofertas</a></li>
            <li><a href="login.html">Ingresar</a></li>
            <li><a href="registrate.html">Registrate</a></li>
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

        <form id="formulario" class="IngresarDatos" action="registrate.php" method="post">
          <p class="nombre">
            <label class="completar" for="nombre"></label>
            <input type="text" name="nombre" placeholder="Nombre" value="<?=$usernameDefault?>" required>
          </p>
          <p class="apellido">
            <label class="completar" for="apellido"></label>
            <input type="text" name="apellido" placeholder="Apellido" value="<?=$apellidoDefault?>" required>
          </p>
          <p class="email">
            <label class="completar" for="email"></label>
            <input type="email" name="email" placeholder="Email" value="<?=$emailDefault?>" required>
          </p>
          <p class="contraseña">
            <label class="completar" for="contraseña"></label>
            <input type="password" name="contraseña" placeholder="Contraseña" required>
          </p>
        </form>

        <div class="checkbox">
          <div class="novedades">
            <p>
              <label for="novedades"></label>
              <input type="checkbox" name="novedades" value="novedades">Quiero reccibir novedades por email
            </p>
          </div>
        </div>
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

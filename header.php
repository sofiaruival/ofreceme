<?php
  include_once("./funciones.php");
 ?>

<header>
  <div class="top-container">
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
    <!-- traer la foto si esta logueado pero me salta fatal error!-->
    <div class="bienvenida">
    <?php if (estaLogueado()) : ?>
      <p  ><?= $_SESSION["usuarioLogueado"]; ?> </p>
      <img src="<?= traerFoto() ?>" alt="">
    <?php endif;?>
    </div>
  </div>
  <nav class="nav-principal">
    <ul>
      <li><a href="index.php">Inicio</a></li>
      <li><a href="#">Ofertar</a></li>
      <li><a href="#">Ofertas</a></li>

      <?php if(estaLogueado() === FALSE): ?>
          <li class="oculto"><a href="#">Logout</a></li>
          <li><a href="login.php">Ingresar</a></li>
          <li><a href="registrate.php">Registrate</a></li>
      <?php else: ?>
        <li><a href="./logout.php">Logout</a></li>
        <li class="oculto"><a href="login.php">Ingresar</a></li>
        <li class="oculto"><a href="registrate.php">Registrate</a></li>
        <div class="principal">

      <?php endif; ?>

    </ul>
  </nav>


</header>

@extends('layouts.app')

@section('content')

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="css/master.css">

    <meta charset="utf-8">
    <meta name="" content="">
    <title>ofreceme</title>
  </head>
  <body>
<!--INCLUI EL HEADER QUE ESTA EN PAG SEPARADA!-->
    <?php //include("header.php") ?>

<div class="container">

    <section class="buscar-demanda">
      <div class="articleHeader">
      <h3>¿Quieres ofertar?</h3>

      <form class="home-buscar" action="index.php" method="get">
        <label for="buscar">Haz ofertas a quienes buscan tus productos.</label>
        <input id="buscar" type="text" name="busqueda" value="" required placeholder="Buscar demanda para ...">
      </form>
    </div>
    </section>

    <section class="publicar-demanda">
      <div class="articleHeader">
      <h3>¿Quieres recibir ofertas?</h3>
      <p>Contanos qué necesitas para recibir ofertas.</p>
    </div>
      <div class="articulos">
        <article class="categorias-home">
          <img src="images/Virtue-One-bike-.png-Virtue+One+bike+.png"
          alt="Articulos nuevos">
          <a href="#">Productos nuevos</a>
        </article>
        <article class="categorias-home">
          <img src="images/tv-vintage2.jpg"
          alt="Articulos usados">
          <a href="#">Productos usados</a>
        </article>
        <article class="categorias-home">
          <img src="images/mano-con-tornillo.jpeg" alt="Img">
          <a href="#">Servicios</a>

        </article>
    </div>
    </section>
  </div>
  </body>
</html>
@endsection

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

    <div class="quiero">
      <h1><a class="more" href="/newproduct">QUIERO UN/UNA ...</a></h1>

    </div>

    <div class="productos-buscados">

      <h1>PRODUCTOS BUSCADOS</h1>

      <p>Mira los productos y servicios que se estan solicitando y hace tu oferta</p>

      <div class="articulos">
        <article class="categorias-home">
          <img src="images/Virtue-One-bike-.png" alt="Articulos nuevos">
          <a href="/productos/1">Productos nuevos</a>
        </article>
        <article class="categorias-home">
          <img src="images/tv-vintage2.jpg"
          alt="Articulos usados">
          <a href="/productos/2">Productos usados</a>
        </article>
        <article class="categorias-home">
          <img src="images/mano-con-tornillo.jpeg" alt="Img">
          <a href="/productos/3">Servicios</a>
        </article>
      </div>
        <h1>
          <form class="home-buscar" action="/search" method="get">
             {{csrf_field()}}
             <label for="buscar">BUSCADOR</label>
             <input id="buscar" type="text" name="busqueda" value="" required placeholder="Buscar demanda para ...">
             <input type="submit" name="" value="Buscar">
           </form>
        </h1>

    </div>

  </div>
  </body>
</html>
@endsection

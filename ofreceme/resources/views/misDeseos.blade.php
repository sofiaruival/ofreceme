@extends('layouts.app')

@section('content')

<!DOCTYPE html>


<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="/css/font-awesome.min.css">
		<link rel="stylesheet" href="/css/stylesProducto.css">
		<title>Responsive Web Design</title>
	</head>
	<body>

	<div class="container">

    <!-- Titulo-->
    <h1>Lista de deseos de {{Auth::user()->nombre}}</h1>
		<!-- Productos -->
		<section class="vip-products">

      @foreach($productos as $producto)
        <article class="product">
  				<div class="photo-container">

  					<img class="photo" src="{{$producto->getPicture()}}" alt="pdto 01">
  					<img class="special" src="/images/img-nuevo.png" alt="plato nuevo">
  					<!-- <a class="zoom" href="#">Ampliar foto</a> -->
  				</div>
  				<h2>{{$producto->nombre}}</h2>
  				<p>{{$producto->precio}}</p>
  				<a href="/detallesOfertasDeMiDeseo/{{$producto->id}}" class="more">VER OFERTAS</a>

				 </article>



      @endforeach



    </section>


	</div>

	</body>


@endsection

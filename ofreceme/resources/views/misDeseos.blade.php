@extends('layouts.app')

@section('content')

<!DOCTYPE html>


<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="/css/font-awesome.min.css">
		<link rel="stylesheet" href="/css/misDeseos.css">
		<link rel="stylesheet" href="/css/master.css">
		<title>Responsive Web Design</title>
	</head>
	<body>

	<div class="containerMisDeseos">

    <div class="tituloOfertasDe">
    		<h1>Lista de deseos de {{Auth::user()->nombre}}</h1>
		</div>
		<!-- Productos -->
		<div class="articulosMisDeseos">

      @foreach($productos as $producto)
				@if ($producto->state != 2)

        <div class="cadaDeseo">
  					<div class="photo-container">
  						<img class="photo" src="{{$producto->getPicture()}}" alt="pdto 01">
  						<img class="special" src="/images/img-nuevo.png" alt="plato nuevo">
  					<!-- <a class="zoom" href="#">Ampliar foto</a> -->
  					</div>

						<h2>{{$producto->nombre}}</h2>

						<p>{{$producto->precio}}</p>

						<a href="/detallesOfertasDeMiDeseo/{{$producto->id}}" class="more">VER OFERTAS</a>
					</div>
			 @endif

      @endforeach
		</div>
	</div>
</body>

@endsection

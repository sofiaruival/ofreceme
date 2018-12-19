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
		<h2><a href="/misdeseos">Seguir agregando al carrito</a></h2>
		<h1>Ofertas en el Carrito:</h1>
		<p style="color:black">Seleccione las ofertas que desea confirmar su compra.</p>

		<form class="" action="/checkout" method="post">
			@foreach ($ofertas as $oferta)

				<input type="checkbox" name="{{$oferta->id}}" value="2">{{$oferta->descripcion . " $ " . $oferta->precio}}<br>

			@endforeach

				<input type="submit" name="" value="Confirmar">
			</form>


	</body>


@endsection

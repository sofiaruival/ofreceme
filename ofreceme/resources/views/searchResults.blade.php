@extends('layouts.app')

@section('title', 'Search Results')

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

		<h1>
		<form class="home-buscar" action="index.php" method="get">
			<label for="buscar">BUSCADOR</label>
			<input id="buscar" type="text" name="busqueda" value="" required placeholder="Buscar demanda para ...">
		</form>
		</h1>
		<p> {{$productos->count() }} resultado(s) para '{{ request()->input('query')}}'</p>
	</div>





	</body>


@endsection

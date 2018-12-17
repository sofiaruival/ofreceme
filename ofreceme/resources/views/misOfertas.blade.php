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
    <h1>Lista de Ofertas de {{Auth::user()->nombre}}</h1>
		<!-- Lista de ofertas -->


		{{-- @php
			dd(Auth::user()->ofertasRealizadas())
		@endphp --}}
		@foreach (Auth::user()->ofertasRealizadas as $oferta)
			<a href="{{"/producto/".$oferta->producto_id}}">{{$oferta->descripcion}}</a>
			{{'$ ' . $oferta->precio}}
			<br>
		@endforeach


    </section>


	</div>

	</body>


@endsection

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


			<!-- productos -->
			<section class="vip-products">
					<div class="">
		<h1>PRODUCTOS BUSCADOS</h1>
		<form class="home-buscar" action="/search" method="get">
			 {{csrf_field()}}
			 <label for="buscar">BUSCADOR</label>
			 <input id="buscar" type="text" name="busqueda" value="" required placeholder="Buscar demanda para ...">
			 <input type="submit" name="" value="Buscar">
		 </form>
		 <p> {{$productos->count() }} resultado(s) para '{{ request()->input('busqueda')}}'</p>

	</div>


	      @foreach($productos as $producto)
	        <article class="product">
	  				<div class="photo-container">

	  					<img class="photo" src="/images/img-pdto-2.jpg" alt="pdto 01">
	  					<img class="special" src="/images/img-nuevo.png" alt="plato nuevo">
	  					<!-- <a class="zoom" href="#">Ampliar foto</a> -->
	  				</div>
	  				<h2>{{$producto->nombre}}</h2>
	  				<p>
							@isset($producto->marca->nombre)
							{{$producto->marca->nombre}}
							@endisset
						</p>
	  				<a class="more" href="/newOferta/{{$producto->id}}">MAS INFO</a>
						{{-- <a class="btn btn-link" href="/ofertasAestaDemanda">Ver las ofertas que se le hicieron</a> --}}
				   </article>
	      @endforeach



	    </section>


		</div>

		</body>


	@endsection

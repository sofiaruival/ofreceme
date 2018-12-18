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


		<!-- productos -->
		<section class="vip-products">
				<div class="">
					@isset ($tituloPrincipal)
								<h1>{{$tituloPrincipal}}</h1>
					@else
							<h1>PRODUCTOS BUSCADOS</h1>
					@endisset

				</div>

        <article class="product">
  				<div class="photo-container">
  					<img class="photo" src="{{$producto->getPicture()}}" alt="pdto 01">
  				</div>

  				<h2>{{$producto->nombre}}</h2>
  				<p>
						@isset($producto->marca->nombre)
						{{$producto->marca->nombre}}
						@endisset
					</p>
				 </article>

	    </section>


		<div class="ofertas">
			<h2>OFERTAS RECIBIDAS</h2>
			@foreach ($producto->bringOfertas as $oferta)
				<form class="" action="/addToCart" method="post">
					@csrf
					<input type="text" name="oferta_id" value="{{$oferta->id}}" style="display:none">
					<button type="submit" name="button">Agregar al carrito</button>
					<strong>{{$oferta->descripcion}}</strong>
					<span>$ {{$oferta->precio}}</span>
				</form>

					<br>
			@endforeach
		</div>
	</div>
	</body>


@endsection

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
							<h1>PARA MI PRODUCTO DESEADO :</h1>
					@endisset

				<h2>{{$producto->nombre}}</h2>
        <article class="product">
  				<div class="photo-container">
  					<img class="photo" src="{{$producto->getPicture()}}" alt="pdto 01">
  				</div>


  				<p>
						@isset($producto->marca->nombre)
						{{$producto->marca->nombre}}
						@endisset
					</p>
				 </article>

	    </section>


		<div class="ofertas">


			@foreach ($producto->bringOfertas as $oferta)
				<h2>OFERTAS RECIBIDAS</h2>

				<article class="product" style="float:left" >
					<div class="photo-container" >
						<img class="photo" src="{{$oferta->getPicture()}}" alt="oferta picture">
					</div>

					<h2>{{$oferta->nombre}}</h2>
					Nombre: {{$oferta->descripcion}}
					<br>
					Al precio: {{$oferta->precio}}
					<br>
					Usuario: {{$oferta->user_id}}
					<br>

					<form class="" action="/miCarrito/{{$oferta->id}}" method="post">
						@csrf
						<input type="text" name="oferta_id" value="{{$oferta->id}}" style="display:none">
						<button type="submit" name="button">Agregar al carrito</button>




					</form>
				</article>

			@endforeach
		</div>
	</div>
	</body>


@endsection

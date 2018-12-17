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


      @foreach($productos as $producto)
        <article class="product">
  				<div class="photo-container">

  					<img class="photo" src="{{$producto->getPicture()}}" alt="pdto 01">
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

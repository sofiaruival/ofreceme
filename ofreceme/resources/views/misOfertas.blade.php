@extends('layouts.app')

@section('content')

<!DOCTYPE html>


<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="/css/font-awesome.min.css">
		<link rel="stylesheet" href="/css/misOfertas.css">
		<link rel="stylesheet" href="/css/master.css">

		<title>Responsive Web Design</title>
	</head>
	<body>

	<div class="container">

		<div class="tituloOfertasDe">
    <!-- Titulo-->
    <h1>Lista de Ofertas de {{Auth::user()->nombre}}</h1>
		<!-- Lista de ofertas -->
		</div>

		<article class="articulosViewOfertas">
			@foreach (Auth::user()->ofertasRealizadas as $oferta)

				<div class="cadaOferta">

				<h2>Para el deseo:</h2>
				<h3><a href="/newOferta/{{$oferta->bringProducto->id}}">{{$oferta->bringProducto->nombre}}</a></h3>
				<h2>{{$oferta->nombre}}</h2>
				<br>
				<h1>Ofreciste: {{$oferta->descripcion}}</h1>

				<h1>Al precio de $ {{$oferta->precio}}</h1>
				<div class="photo-container" >
						<img class="photo" src="{{$oferta->getPicture()}}" alt="oferta picture">
				</div>


				{{-- <a class="more" href="/OfertaInfo/{{$oferta->id}}">MAS INFO</a> --}}
				{{-- <a class="btn btn-link" href="/ofertasAestaDemanda">Ver las ofertas que se le hicieron</a> --}}
				</div>



			{{-- <div class="">


			Deseo: {{$oferta->bringProducto->nombre}}
			Mi oferta:

			<a href="{{"/newOferta/".$oferta->producto_id}}">{{$oferta->descripcion}}</a>
			{{'$ ' . $oferta->precio}}
			<br>

			</div> --}}
		@endforeach
	</article>






	</div>

	</body>


@endsection


{{--
      @foreach($productos as $producto)

      @endforeach



    </section>


	</div>

	</body>


@endsection --}}

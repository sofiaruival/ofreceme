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

	<div class="container" style="overflow:hidden">

    <!-- Titulo-->
    <h1>Lista de Ofertas de {{Auth::user()->nombre}}</h1>
		<!-- Lista de ofertas -->

		@foreach (Auth::user()->ofertasRealizadas as $oferta)

			<article class="product" style="float:left" >
				<div class="photo-container" >

					<img class="photo" src="{{$oferta->getPicture()}}" alt="oferta picture">

				</div>
				<h2>Para el deseo:</h2>
				<h3><a href="/newOferta/{{$oferta->bringProducto->id}}">{{$oferta->bringProducto->nombre}}</a></h3>
				<h2>{{$oferta->nombre}}</h2>
				Ofreciste: {{$oferta->descripcion}}
				<br>
				Al precio: {{$oferta->precio}}
				<br>
				<a class="more" href="/OfertaInfo/{{$oferta->id}}">MAS INFO</a>
				{{-- <a class="btn btn-link" href="/ofertasAestaDemanda">Ver las ofertas que se le hicieron</a> --}}
			</article>



			{{-- <div class="">


			Deseo: {{$oferta->bringProducto->nombre}}
			Mi oferta:

			<a href="{{"/newOferta/".$oferta->producto_id}}">{{$oferta->descripcion}}</a>
			{{'$ ' . $oferta->precio}}
			<br>

			</div> --}}
		@endforeach





	</div>

	</body>


@endsection

--------------------------------------------------------------------------

{{--
      @foreach($productos as $producto)

      @endforeach



    </section>


	</div>

	</body>


@endsection --}} --}}

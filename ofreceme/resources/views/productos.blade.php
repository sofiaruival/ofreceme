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


<section class="vip-products">
		<div class="tituloProductosBuscados">
					@isset ($tituloPrincipal)
								<h1>{{$tituloPrincipal}}</h1>
					@else
							<h1>PRODUCTOS BUSCADOS</h1>
					@endisset
			</div>

		<div class="listadoDeProductos">

				<article class="articulosViewproductos">

      		@foreach($productos as $producto)
						@if ($producto->state != 2)

						<div class="cadaArticulo">

  						<div class="photo-container">
  							<img class="photo" src="{{$producto->getPicture()}}" alt="pdto 01">
  							<img class="special" src="/images/img-nuevo.png" alt="plato nuevo">
  							<!-- <a class="zoom" href="#">Ampliar foto</a> -->
  						</div>

  						<h2>NOMBRE:<br><br>{{$producto->nombre}}</h2>

							<p>
								@isset($producto->marca->nombre)
									MARCA:<br><br>{{$producto->marca->nombre}}
								@endisset
							</p>



							@if ($producto->usuario_id == Auth::id())

							<a class="more" href="/misOfertasRecibidas/{{$producto->id}}">VER OFERTAS</a>
							@else

							<a class="more" href="/newOferta/{{$producto->id}}">MAS INFO</a>
							{{-- <a class="btn btn-link" href="/ofertasAestaDemanda">Ver las ofertas que se le hicieron</a> --}}
							@endif
						</div>
							@endif
      	@endforeach
				</article>
		</div>
 </section>
</div>

</body>

@endsection

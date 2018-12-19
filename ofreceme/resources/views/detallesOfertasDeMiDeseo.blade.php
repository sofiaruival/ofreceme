@extends('layouts.app')

@section('content')

<!DOCTYPE html>


<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="/css/font-awesome.min.css">
		<link rel="stylesheet" href="/css/detallesOfertasDeMiDeseo.css">
		<title>Responsive Web Design</title>
	</head>
	<body>

	<div class="containerDetalles">

			<div class="tituloDetalle">
    		<h1>Ofertas a mi producto deseado</h1>
			</div>

			<div class="articulosDetalle">
				<!-- productos -->
			<div class="cadaDetalle">

				<div class="dentroDeCadaDetalle">
				 		@isset ($tituloPrincipal)
							 <h1>{{$tituloPrincipal}}</h1>
				 		@else
						 	<h2>PRODUCTO</h2>
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
						</div>

						<div class="dentroDeCadaDetalle">
						<div class="ofertas">
										<h2>OFERTAS RECIBIDAS</h2>
										@foreach ($producto->bringOfertas as $oferta)

											<article class="product"  >
												<div class="photo-container" >
														<img class="photo" src="{{$oferta->getPicture()}}" alt="oferta picture">
													</div>
													<h2>{{$oferta->nombre}}</h2>
													Nombre: {{$oferta->descripcion}}
													<br>
													Al precio: {{$oferta->precio}}
													<br>
													<br>


													<form class="" action="/miCarrito/{{$oferta->id}}" method="post">
														@csrf
														<input type="text" name="oferta_id" value="{{$oferta->id}}" style="display:none">
														<button type="submit" name="button">Agregar al carrito</button>
													</form>
												</article>
												<br><br>


											@endforeach
								</div>
								</div>

				</div>
	</body>


@endsection

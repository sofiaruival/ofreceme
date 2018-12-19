@extends('layouts.app')

@section('content')
  <!DOCTYPE html>


  <html>
  	<head>
  		<meta charset="utf-8">
  		<meta name="viewport" content="width=device-width, initial-scale=1.0">
  		<link rel="stylesheet" href="/css/font-awesome.min.css">
  		<link rel="stylesheet" href="/css/newOfertas.css">


  		<title>Responsive Web Design</title>
  	</head>
  	<body>
<div class="container">

  <div class="tituloNuevaOfertasDe">
  <h1>DETALLE PRODUCTO BUSCADO</h1>
  </div>



  <div class="articulosRelaciones">

        @if ($errors->any()) {{-- Muestra los errores que vienen de las validaciones en el controlador --}}
          <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                  @endforeach
                </ul>
              </div>
            @endif
              <div class="caja">
                <h1>Detalle producto</h1>
                <article class="product">
                  <div class="photo-container">

                    <img class="photo" src="{{$producto->getPicture()}}" alt="pdto 01">
                    <img class="special" src="/images/img-nuevo.png" alt="plato nuevo">
                  <!-- <a class="zoom" href="#">Ampliar foto</a> -->
                  </div>
                  <h2>{{$producto->nombre}}</h2>
                {{-- <p>{{$producto->marca->nombre}}</p> --}}
              </article>
              </div>


              <div class="caja">

                <h1>Ofertas Realizadas</h1>

                @foreach ($producto->bringOfertas as $oferta)
                  <strong>{{$oferta->descripcion}}</strong>
                  <span>$ {{$oferta->precio}}</span>
                  <br>
                @endforeach

              </div>


              <div class="caja">

                  <h1>Realizar Nueva Ofera</h1>
                  <form class="" action="/newOferta" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                      <label for="">Descripcion del Producto o Servicio que va a Ofertar</label>
                      <input type="text" name="descripcion" value='@if (isset($oferta->descripcion)) {{$oferta->descripcion}} @endif'>
                      </div>

                    <div class="form-group">
                      <label for="">Precio</label>
                      <input type="float" name="precio" value="@if (isset($oferta->precio)) {{$oferta->precio}} @endif">
                    </div>

                    <div class="form-group row">
                      <label for="picture" class="col-md-4 col-form-label text-md-right">{{ __('Picture') }}</label>
                        <div class="col-md-6">
                          <input id="picture" type="file" class="form-control" name="picture" required>
                        </div>
                    </div>

                    <input type="text" name="product_id" value="{{$producto->id}}" style="display:none">
                    <button type="submit" name="button">Ofertar</button>
                  </form>

                </div>

      </div>


</div>
</body>
@endsection

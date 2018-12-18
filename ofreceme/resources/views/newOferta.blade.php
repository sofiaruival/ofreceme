@extends('layouts.app')

@section('content')


@if ($errors->any()) {{-- Muestra los errores que vienen de las validaciones en el controlador --}}
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<section>
  <article class="product">
    <div class="photo-container">

      <img class="photo" src="{{$producto->getPicture()}}" alt="pdto 01">
      <img class="special" src="/images/img-nuevo.png" alt="plato nuevo">
      <!-- <a class="zoom" href="#">Ampliar foto</a> -->
    </div>
    <h2>{{$producto->nombre}}</h2>
    {{-- <p>{{$producto->marca->nombre}}</p> --}}

   </article>
</section>
<h1>NUEVA OFERTA</h1>

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
<br>
<hr>
{{-- Seccion de ofertas --}}
<h2>OFERTAS REALIZADAS</h2>
@foreach ($producto->bringOfertas as $oferta)
    <strong>{{$oferta->descripcion}}</strong>
    <span>$ {{$oferta->precio}}</span>
    <br>
@endforeach

@endsection

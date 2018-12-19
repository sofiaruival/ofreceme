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
<h1>CARRITO</h1>



<br>
<hr>
{{-- Seccion de ofertas --}}
<h2>OFERTAS RECIBIDAS</h2>

@foreach ($producto->bringOfertas as $oferta)
    <strong>{{$oferta->descripcion}}</strong>
    <span>$ {{$oferta->precio}}</span>
    <br>
@endforeach

@endsection

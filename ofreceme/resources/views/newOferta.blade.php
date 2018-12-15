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
<h1>NUEVA OFERTA</h1>
<form class="" action="" method="post">
  @csrf
  <div class="form-group">
    <label for="">Descripcion del Producto o Servicio que va a Ofertar</label>
    <input type="text" name="descripcion" value='@if (isset($oferta->descripcion)) {{$oferta->descripcion}} @endif'>
  </div>

  <div class="form-group">
    <label for="">Precio</label>
    <input type="float" name="precio" value="@if (isset($oferta->precio)) {{$oferta->precio}} @endif">
  </div>

  <button type="submit" name="button">guardar</button>
</form>

@endsection

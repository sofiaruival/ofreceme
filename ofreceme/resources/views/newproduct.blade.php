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

<form class="" action="" method="post">
  @csrf
  <div class="form-group">
    <label for="">Nombre del producto</label>
    <input type="text" name="nombre" value='@if (isset($producto->nombre)) {{$producto->nombre}} @endif'>
  </div>
  <div class="form-group">
    <label for="">Marca</label>
    <input type="text" name="nombre" value='@if (isset($producto->nombre)) {{$producto->nombre}} @endif'>
  </div>
  <div class="form-group">
    <label for="">Precio</label>
    <input type="float" name="precio" value="@if (isset($producto->precio)) {{$producto->precio}} @endif">
  </div>

  <button type="submit" name="button">guardar</button>
</form>

@endsection

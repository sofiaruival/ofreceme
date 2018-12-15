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
<h1>NUEVO PRODUCTO BUSCADO</h1>
<form class="" action="" method="post" enctype="multipart/form-data">
  @csrf
  <div class="form-group">
    <label for="nombre">Nombre del producto</label>
    <input id="nombre"type="text" name="nombre" value='@if (isset($producto->nombre)) {{$producto->nombre}} @endif'>
  </div>
  <div class="form-group">
    <label for="">Categoria</label>
    <select name="categoria">
     <option value="1">Nuevo</option>
     <option value="2">Usado</option>
     <option value="3">Servicio</option>
   </select>
  </div>
  <div class="form-group">
      <label for="cantidad">Cantidad</label>
      <input id="cantidad" type="number" name="cantidad" value="1">
  </div>
  <div class="form-group">
    <label for="">Precio</label>
    <input type="float" name="precio" value="@if (isset($producto->precio)) {{$producto->precio}} @endif">
  </div>

  <div class="form-group row">
      <label for="picture" class="col-md-4 col-form-label text-md-right">{{ __('Picture') }}</label>

      <div class="col-md-6">
          <input id="picture" type="file" class="form-control" name="picture" required>
      </div>
  </div>

  <button type="submit" name="button">guardar</button>
</form>

@endsection

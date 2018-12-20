@extends('layouts.app')

@section('content')
  <!DOCTYPE html>


  <html>
  	<head>
  		<meta charset="utf-8">
  		<meta name="viewport" content="width=device-width, initial-scale=1.0">
  		<link rel="stylesheet" href="/css/font-awesome.min.css">
  		<link rel="stylesheet" href="/css/master.css">
  		<link rel="stylesheet" href="/css/newProduct.css">

  		<title>Responsive Web Design</title>
  	</head>
  	<body>
  <div class="containerNewProduct">


@if ($errors->any()) {{-- Muestra los errores que vienen de las validaciones en el controlador --}}
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="tituloNewProduct">
  <h1>NUEVO PRODUCTO BUSCADO</h1>
</div>

<div class="formulario">
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
      <button type="submit" name="button"class="button">guardar</button>
</form>
</div>
</body>

@endsection

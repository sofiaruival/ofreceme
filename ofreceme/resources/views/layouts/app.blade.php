
@section('content')
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
      @yield('title')
    </title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
        <!-- laravel -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link rel="stylesheet" href="/css/master.css">
    <link rel="stylesheet" href="/css/font-awesome.min.css">
    <link rel="stylesheet" href="/css/stylesProducto.css">

    <!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->
</head>
<body>
    <div id="app">


<!-- --- Aca borramos el nav-bar del Auth. ---- -->

<header>
  <div class="top-container">
    <ul>
      <li>
        <a href="/"><img class="logo_corto" src="/images/logo.png" alt="logo"></a>
      </li>
      <li>
        <a href="/"><img class="logo_largo" src="/images/logo_largo.png" alt="logo"></a>
      </li>
      <li>
        <a href="#" class="toggle-nav">
          <span class="fa fa-bars"></span>
        </a>
      </li>
    </ul>
    <!-- traer la foto si esta logueado pero me salta fatal error!-->
    <div class="bienvenida">

    <?php if (Auth::check()) : ?>
      <p>{{Auth::user()->email}}</p>
      <img src="/storage/pictures/{{Auth::user()->picture}}" alt="">
    <?php endif;?>
    </div>
  </div>
  <nav class="nav-principal">
    <ul>
      <li><a href="/">Inicio</a></li>
      <li><a href="#"></a></li>
      <li><a href="#"></a></li>

      {{-- @if (Session::get("cart"))
        <li>
          <a href="/checkout">
            <button type="button" class="btn btn-success">Checkout</button>
          </a>
        </li>
      @endif --}}

      <?php if(!Auth::check()): ?>
          <li class="oculto"><a href="#">Logout</a></li>
          <li><a href="/login">Ingresar</a></li>
          <li><a href="/register">Registrate</a></li>
      <?php else: ?>
        <li><a href="/miCarrito">Mi carrito</a></li>
        <li><a href="/misofertas">Mis ofertas</a></li>
        <li><a href="/misdeseos">Mis deseos</a></li>


        <li>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="{{ route('logout') }}"
               onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
          </div>
        </li>

        <li class="oculto"><a href="/login">Ingresar</a></li>
        <li class="oculto"><a href="/register">Registrate</a></li>
        <div class="principal">

      <?php endif; ?>

    </ul>
  </nav>


</header>

<!-- -------------------------------------------------------------------------- -->

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>

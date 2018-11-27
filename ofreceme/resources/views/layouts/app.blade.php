
@section('content')
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

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
    <!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->
</head>
<body>
    <div id="app">

      <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
          <div class="container">
              <a class="navbar-brand" href="{{ url('/') }}">
                  {{ config('app.name', 'Laravel') }}
              </a>
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                  <span class="navbar-toggler-icon"></span>
              </button>

              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  <!-- Left Side Of Navbar -->
                  <ul class="navbar-nav mr-auto">

                  </ul>

                  <!-- Right Side Of Navbar -->
                  <ul class="navbar-nav ml-auto">
                      <!-- Authentication Links -->
                      @guest
                          <li class="nav-item">
                              <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                          </li>
                          <li class="nav-item">
                              @if (Route::has('register'))
                                  <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                              @endif
                          </li>
                      @else
                          <li class="nav-item dropdown">
                              <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                  {{ Auth::user()->name }} <span class="caret"></span>
                              </a>

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
                      @endguest
                  </ul>
              </div>
          </div>
      </nav>
<!-- -------------------------------------------------------------------------- -->

<header>
  <div class="top-container">
    <ul>
      <li>
        <a href="index.php"><img class="logo_corto" src="images/logo.png" alt="logo"></a>
      </li>
      <li>
        <a href="index.php"><img class="logo_largo" src="images/logo_largo.png" alt="logo"></a>
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
      <li><a href="index.php">Inicio</a></li>
      <li><a href="#">Ofertar</a></li>
      <li><a href="#">Ofertas</a></li>

      <?php if(!Auth::check()): ?>
          <li class="oculto"><a href="#">Logout</a></li>
          <li><a href="/login">Ingresar</a></li>
          <li><a href="/register">Registrate</a></li>
      <?php else: ?>
        <li><a href="./logout.php">Logout</a></li>
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

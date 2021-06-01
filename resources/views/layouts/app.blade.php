<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('titulo')</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('https://pro.fontawesome.com/releases/v5.10.0/css/all.css') }}"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    @yield('ScriptJS')

    <link rel="shortcut icon" type="image/png" href="{{ asset('resourcesApp/logo.png') }}" />
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm sticky-top">
            <div class="container-fluid">
                <span id="titleWeb"><a class="nav-link" href="{{ url('/') }}">MyFreEbook <img
                            src="{!! asset('resourcesApp/logo.png') !!}" id="logoImg"></a></span>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">


                    <form class="form-inline  ml-auto my-2 my-lg-0" action="{{ route('search.searchBook') }}"
                        method="GET">
                        <input class="form-control mr-sm-2" id="imputSearchBookWelcome" type="search" name="search" placeholder="Buscar libro"
                            aria-label="Search" minlength="3" required>
                        <button class="btn btn-secondary my-2 my-sm-0" type="submit"><i
                                class="fas fa-search"></i></button>
                    </form>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto" id="linksUL">

                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-options" href="{{ route('login') }}">Iniciar sesión</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-options" href="{{ route('register') }}">Regístrate</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-options dropdown-toggle" href="#" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    @if (Auth::user()->hasRole('User'))
                                        <a class="dropdown-item" id="indexPageLink"
                                            href="{{ route('user.showProfile') }}">Mi perfil</a>
                                    @endif
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                                                                 document.getElementById('logout-form').submit();">
                                        Cerrar sesión
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                        <li class="nav-item">
                            <a class="nav-options" id="about"
                                href="{{ route('index.about') }}">Sobre nosotros</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-options" id="contactPageLink"
                            href="{{ route('index.contact') }}">Contacto</a>
                        </li>
                    </ul>


                </div>
            </div>
        </nav>

        @if ($mensaje = Session::get('success'))
            <div class="alert alert-success">
                <h5 class="alertH">{{ $mensaje }}</h5>
            </div>
        @endif

        @if ($mensaje = Session::get('error'))
            <div class="alert alert-warning">
                <h5 class="alertH">{{ $mensaje }}</h5>
            </div>
        @endif

        @if ($mensaje = Session::get('danger'))
            <div class="alert alert-danger">
                <h5 class="alertH">{{ $mensaje }}</h5>
            </div>
        @endif

        @if(Auth::check())
        @if (Auth::user()->hasRole('Admin'))
            @include('admin/controlPanel')
        @else
            <main>
        @endif
        @else
        <main>
        @endif

            <br>
            @yield('content')
            </main>

        <br>
        <br>
        <footer class="footer">
            <div class="container-fluid">
                <hr id="hrFooter">
                <div class="row">
                    <div class="col-12 text-center">
                        <p><i class="far fa-copyright"></i> MyFreEbook - Vicente Vicente Mulero</p>
                    </div>
                </div>
                <div class="row">

                    <div class="col-12 text-center">
                        <p> <a href="#">Política de privacidad</a> | <a href="#">Política de cookies </a> | <a
                                href="{{ route('index.contact') }}">Contacto</a></p>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</body>

</html>

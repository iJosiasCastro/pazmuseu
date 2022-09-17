<!doctype html>
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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600&display=swap" rel="stylesheet">
    

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>
<body>
    @yield('css')

    <div id="app">
        <div class="">
            <nav class="navbar navbar-light navbar-expand-lg pl-lg-5 pl-md-3 pr-lg-5 pr-md-3">
                <a href="/" class="align-items-center align-items-sm-center d-flex navbar-brand">
                    <img src="/img/logo.png" height="50px" class="mr-2"/>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse ml-auto navbar-collapse" id="navbarSupportedContent">
                    <ul class="ml-auto navbar-nav text-center">
                        <li class="active nav-item">
                            <a class="font-weight-bold nav-link text-dark rounded-pill px-3 mx-2" href="/turnos">Turnos</a>
                        </li>
                        <li class="active nav-item">
                            <a class="font-weight-bold nav-link text-dark rounded-pill px-3 mx-2" href="/rutas">Rutas</a>
                        </li>
                        <li class="active nav-item">
                            <a class="font-weight-bold nav-link text-dark rounded-pill px-3 mx-2" href="/exposiciones">Exposiciones</a>
                        </li>
                        <li class="active nav-item">
                            <a class="font-weight-bold nav-link bg-primary text-white rounded-pill px-3 mx-2" href="/pazmuseu.apk">Descargar app</a>
                        </li>
                    </ul>
                </div>
            </nav>
            <slot></slot>
        </div>
        {{-- <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    
                                    @can('admin.index')
                                        <a class="dropdown-item" href="{{route('admin.index')}}">
                                            Administración
                                        </a>
                                    @endif

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>

                                <div>

                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav> --}}

        <main class="">
            @yield('content')
        </main>

        <div>
            <footer>
                <div class="spacer-lg"></div>
                <nav class="bg-secondary d-flex d-sm-flex flex-column flex-sm-row navbar navbar-dark pl-lg-5 pl-md-3 pr-lg-5 pr-md-3" data-pgc-define="footer" data-pgc-define-name="footer">
                    <a to="/" class="align-items-center align-items-sm-center d-flex navbar-brand">
                        <img src="/img/logo.png" height="50px" class="mr-2"/>
                    </a>
                    <div id="navbarSupportedContent" class="ml-0 ml-sm-auto">
                        <ul class="ml-auto navbar-nav text-center">
                            <li class="active nav-item">
                                @if (Auth::check())
                                    <a class="font-weight-bold nav-link text-dark" href="/administrar">Administrar</a>
                                @else
                                    <a class="font-weight-bold nav-link text-dark" href="/ingresar">Ingresar</a>
                                @endif
                            </li>
                        </ul>
                    </div>
                </nav>
            </footer>
        </div>
    </div>
    
    @yield('js')

    <script src="/js/jquery.min.js"></script>
    <script src="/js/popper.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/252250494d.js" crossorigin="anonymous"></script>
</body>
</html>

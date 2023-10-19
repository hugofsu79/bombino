<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    {{-- favicon --}}
    <link rel="icon" href="{{ asset('favicon.ico') }}">
    <!-- Fonts -->
    <link rel="stylesheet" href="https://use.typekit.net/vbd7zxg.css">
    <link href="https://fonts.cdnfonts.com/css/sf-pro-display" rel="stylesheet">
    {{-- Font -> 404 typographie --}}
    <link rel="stylesheet" href="https://use.typekit.net/vbd7zxg.css">
    <!--************ Scripts - CSS ************-->
    @vite(['resources/sass/app.scss', 'resources/css/app.css'])
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    {{-- fontawesome --}}
    <script src="https://kit.fontawesome.com/826eec2b4c.js" crossorigin="anonymous"></script>

</head>


<body>
    <header>
        <div id="app">
            <nav class="navbar fixed-top navbar-expand-lg">
                <div class="container-fluid">
                    <a class="navbar-brand" type="button"href="{{ route('home') }}">
                        <div class="row">
                            <div class="col">
                                <img class="logo m-2" width="23%" src="{{ asset('svg/bombino_v2-06.svg') }}"
                                    alt="home_button">
                            </div>
                            <div class="col">
                                <p class="home_signification">Home</p>
                            </div>
                        </div>
                    </a>
                    <a href="#"><img class="logo_footer" src="{{ asset('svg/bombino_blanc.svg') }}"
                            alt=""width="40%"></a>
                    @guest
                        <div class="navbar" id="navbarSupportedContent">
                            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                <li class="nav-item">
                                    @if (Route::has('register'))
                                        <a class="left_button" href="{{ route('register') }}">Inscription</a>
                                    @endif
                                </li>
                                <li class="nav-item">
                                    @if (Route::has('login'))
                                        <a class="left_button" href="{{ route('login') }}">
                                            Connexion</a>
                                    @endif
                                </li>
                            @else
                                <li class="nav-item">
                                    @if (Auth::user()->role_id == 2)
                                        <a class="left_button" href="{{ route('admin') }}">
                                            Back-office
                                        </a>
                                    @endif
                                </li>

                                <li>
                                    @if (Route::has('login'))
                                        <a class="left_button" href="{{ route('user.edit', $user = Auth::user()) }}">Mon
                                            profil</a>
                                    @endif
                                </li>

                                <li class="nav-item">
                                    <a class="left_button" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                                document.getElementById('logout-form').submit();">
                                        {{ __('Déconnexion') }}
                                    </a>
                                </li>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </ul>
                            <li class="nav-item">
                                @if (Auth::user()->role_id == 1)
                                    <span
                                        class="badge_panier position-absolute top-25 translate-middle p-2 bg-danger rounded-circle">
                                    </span>

                                    {{-- @endif --}}
                                    <a class="panier" aria-current="panier" href="{{ route('panier.show') }}">
                                        <img width="60%" src="{{ asset('svg/panier_v2_white.svg') }}" alt="panier">
                                    </a>
                                @endif
                            </li>
                        </div>
                    @endguest
                </div>
            </nav>
        </div>
    </header>
    <main>
        <div class="notification container-fluid text-center">
            @if (session()->has('message'))
                <p class="alert alert-success">{{ session()->get('message') }}</p>
            @endif

            @if ($errors->any())
                <div class=" alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
        @yield('content')
    </main>

    <footer>
        <div class="row">
            <div class="col">
                <div class="col"><a href="#"><img class="logo_footer"
                            src="{{ asset('svg/bombino_logo.svg') }}" alt=""width="80%"></a>
                </div>
            </div>
            <div class="col">
                <ul>
                    <li>Menu</li>
                    <li>Impact</li>
                    <li>retail</li>
                    <li>find Apeel</li>
                    <li>products</li>
                    <li>Careers</li>
                    <li>Blog</li>
                </ul>
            </div>
            <div class="col">
                <ul>
                    <li>How Apeel Worlds</li>
                    <li>Impact</li>
                    <li>retail</li>
                    <li>find Apeel</li>
                    <li>products</li>
                    <li>Careers</li>
                    <li>Blog</li>
                </ul>
            </div>
        </div>
        <div class="row pt-3" style="border-block-start: 1px solid; 
        writing-mode: horizontal-tb;">
            <div class="col">1 Rue Gambetta, 79000 Niort</div>
            <div class="col">© 2021, Bombino</div>
            <div class="col">
                <div class="row">
                    <a href="https://www.facebook.com/bombinopizza/?locale=fr_FR" target="_blank" class="col"><i
                            class="fa-brands fa-facebook fa-2x" style="color: #000000;"></i></a>
                    <div class="col"><i class="fa-brands fa-x-twitter fa-2x" style="color: #000000;"></i></div>
                    <a href="https://www.instagram.com/bombinolife/?hl=fr" target="_blank" class="col"><i
                            class="fa-brands fa-square-instagram fa-2x" style="color: #000000;"></i></a>
                </div>
            </div>
        </div>
    </footer>
</body>


</html>

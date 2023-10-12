<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://use.typekit.net/vbd7zxg.css">
    <link href="https://fonts.cdnfonts.com/css/sf-pro-display" rel="stylesheet">
    <!--************ Scripts - CSS ************-->
    @vite(['resources/sass/app.scss', 'resources/css/app.css'])
    {{-- fontawesome --}}
    <script src="https://kit.fontawesome.com/826eec2b4c.js" crossorigin="anonymous"></script>

</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-lg fixed-top">
            <div class="container-fluid">
                <a class="navbar-brand" type="button"href="{{ route('home') }}">
                    <img class="logo m-2" width="23%" src="{{ asset('svg/bombino_v2-06.svg') }}" alt="home_button">
                </a>
                @guest
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                @if (Route::has('register'))
                                    <a class="right_button nav-link ps-2" href="{{ route('register') }}">Inscription</a>
                                @endif
                            </li>
                            <li class="nav-item">
                                @if (Route::has('login'))
                                    <a class="right_button nav-link" href="{{ route('login') }}">
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
                        </ul>
                        <li class="nav-item">
                            @if (Auth::user()->role_id == 2)
                                <a class="panier" aria-current="panier" href="{{ route('panier.show') }}"><img
                                        width="90%" src="{{ asset('svg/panier-10.svg') }}" alt="panier"></a>
                            @endif
                        </li>
                    </div>
                @endguest
            </div>
        </nav>


        <div class="container-fluid text-center mt-5 pt-5">
            @if (session()->has('message'))
                <p class="alert alert-success">{{ session()->get('message') }}</p>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>

        <main>
            @yield('content')
        </main>
    </div>
</body>
<footer>
    <div class="row">
        <div class="col">
            <div class="col"><img class="logo_footer" src="{{ asset('svg/bombino_logo.svg') }}" alt=""width="80%"></div>
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
    <div class="row">
        <div class="col">1 Rue Gambetta, 79000 Niort</div>
        <div class="col">© 2022, Apeel Sciences. All rights reserved.</div>
        <div class="col">
            <div class="row">
                <div class="col"><i class="fa-brands fa-facebook fa-2x" style="color: #000000;"></i></div>
                <div class="col"><i class="fa-brands fa-x-twitter fa-2x" style="color: #000000;"></i></div>
                <div class="col"><i class="fa-brands fa-square-instagram fa-2x" style="color: #000000;"></i></div>
            </div>
        </div>
    </div>
</footer>

<script>
    window.onscroll = function() {
        let navbar = document.getElementsByTagName('nav')[0]
        if (window.scrollY > 520) {
            navbar.classList.add("scroll-background");
        } else {
            navbar.classList.remove("scroll-background");
        }
    }
</script>
</html>

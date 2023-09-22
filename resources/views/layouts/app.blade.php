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

</head>

<body>
    <nav id="navbar" class="default-background fixed-top">

        <!-------------------------------- liens accessibles à tous --------------------------------->


        {{-- <!-------------------------------- liens accessibles aux invités uniquement ---------------------------------> --}}

        <div>

            @guest
                <div class="dropdown_nav dropdown">
                    <div class="row">
                        <div class="col">
                            <a class="navbar-brand" type="button"href="{{ route('home') }}">
                                <img class="logo m-2" width="23%" src="{{ asset('svg/bombino_v2-06.svg') }}"
                                    alt="home_button">
                            </a>
                        </div>
                        <div class="col">
                            <a href="{{ route('login') }}"><button class="left_button">Réserver</button></a>
                        </div>
                        <div class="col">
                            @if (Route::has('register'))
                                <a class="right_button nav-link ps-2" href="{{ route('register') }}">Inscription</a>
                        </div>
                        @endif

                        <div class="col">
                            @if (Route::has('login'))
                                <a class="right_button nav-link" href="{{ route('login') }}">
                                    Connexion</a>
                            @endif
                        </div>
                    </div>

                </div>
                <!-------------------------------- liens accessibles aux connectés uniquement --------------------------------->
            @else
                <div class="row">
                    <div class="col">
                        <a class="navbar-brand" type="button"href="{{ route('home') }}">
                            <img class="logo m-2" width="23%" src="{{ asset('svg/bombino_v2-06.svg') }}"
                                alt="home_button">
                        </a>
                    </div>
                    <div class="col">
                        <ul class="dropdown-menu">
                            <li></li>
                            <li>
                                <!-- Lien vers "DECONNEXION" -->
                                <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                                            document.getElementById('logout-form').submit();">
                                    {{ __('Déconnexion') }}
                                </a>
                            </li>
                        </ul>
                    </div>

                </div>

            </div>

            <div class="dropdown_nav dropdown">
                <div class="row">
                    <div class="col">
                        <a href="{{  route('booking.create', $user = Auth::user())  }}"><button class="left_button">Réserver</button></a>
                    </div>

                    <div class="col">
                        @if (Route::has('login'))
                                <a class="right_button"  href="{{ route('user.edit', $user = Auth::user()) }}">Mon profil</a>
                        @endif
                    </div>
                    <div class="col">
                        <a class="panier nav-link active position-absolute" aria-current="panier"
                            href="{{ route('panier.show') }}"><img width="80%" src="{{ asset('svg/panier-10.svg') }}"
                                alt="panier"></a>
                    </div>
                </div>

            </div>

            {{-- <a href="{{ route('booking.index') }}">Catalogue</a> --}}


            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>

            @if (Auth::user()->role_id == 2)
                <a href="{{ route('admin') }}">
                    Back-office
                </a>
            @endif

            </div>
            @endif
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

        <main class="py-4">
            @yield('content')
        </main>
        <footer>
            <h1>Le soeur</h1>
        </footer>
    </body>

    </html>

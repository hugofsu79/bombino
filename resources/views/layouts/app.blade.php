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
    @vite(['resources/sass/app.scss', 'resources/js/app.js', 'resources/css/app.css'])

</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-warning shadow-sm fixed-top">
            <div class="container">
                <a class="navbar-brand" href="home#">
                    <img class="w-25" src="{{ asset('images/kahwas_logo.png') }}" alt="Logo">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">


                    {{-- <!-------------------------------- liens accessibles aux invités uniquement ---------------------------------> --}}

                    @guest
                        <div class="col-md-2 d-flex nav-item">
                            @if (Route::has('login'))
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Connexion') }}</a>
                            @endif
                            @if (Route::has('register'))
                                <a class="nav-link ps-2" href="{{ route('register') }}">{{ __('Inscription') }}</a>
                            @endif
                        </div>

                        <!-------------------------------- liens accessibles aux connectés uniquement --------------------------------->
                    @else
                        <div class="col">

                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">

                                    <!-- Lien vers "MON COMPTE" -->
                                    <a class="dropdown-item" href="{{ route('user.edit', $user = Auth::user()) }}">Mon
                                        compte</a>


                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>

                                    @if (Auth::user()->role_id == 2)
                                        <a class="dropdown-item" href="{{ route('admin') }}">
                                            Back-office
                                        </a>
                                    @endif
                                </div>
                            </li>
                        </div>
                        @endif
                    </div>
                </div>
        </div>
        </nav>

        <div class="container-fluid text-center mt-5">
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
    </body>
    <footer>
    </footer>

    </html>

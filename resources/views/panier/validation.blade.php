@extends('layouts.app')
@section('content')
    <div class="container">

        <h1 class="text-center m-5 pt-5">Valider ma commande</h1>
        <div class="table-responsive shadow mb-3">
            <table class="table table-bordered table-hover bg-white mb-0">
                <thead class="thead-dark">
                    <tr>
                        <th style="background-color: #151734;color: white">#</th>
                        <th style="background-color: #151734;color: white">Produit</th>
                        <th style="background-color: #151734;color: white">Quantité</th>
                        <th style="background-color: #151734;color: white">Prix</th>
                        <th style="background-color: #151734;color: white">Total</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Initialisation du total général à 0 -->
                    @php $total = 0 @endphp

                    <!-- On parcourt les produits du panier en session : session('panier') -->
                    @foreach (session('panier') as $position => $article)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                {{ $article['name'] }}
                            </td>


                            <td>
                                {{ $article['quantity'] }}
                                <!--afficher la quantité-->
                            </td>

                            <td>
                                <!-- Le total du montant du produit = price * quantité -->
                                {{ number_format($article['price'] * $article['quantity'], 2, ',', ' ') }}€
                                @php $total += $article['price'] * $article['quantity'] @endphp
                            </td>
                        </tr>
                    @endforeach

                    <tr colspan="2">
                        <td colspan="4">Total général</td>
                        <td colspan="2">
                            <!-- On affiche total général -->
                            <strong>{{ number_format($total, 2, ',', ' ') }} €</strong>

                            @php session()->put('totalapayer', $total); @endphp

                        </td>
                    </tr>

                </tbody>
            </table>
        </div>


        <!-- Section MODIF/VALID INFOS
                                                                                                                                        ============================================================ -->
        <div class="container-fluid m-5">
            <div class="row justify-content-center">
                <div class="col-md-10">


                    <!-- Card
                                                                                                                                            ============================================================ -->
                    <div class="card my-4">


                        <!-- Card header "S'inscrire"
                                                                                                                                                    ============================================================ -->
                        <div class="card-header"><small>{{ __('Informations personnelles') }}</small></div>


                        <!-- Card body
                                                                                                                                                ============================================================ -->
                        <div class="card-body">


                            <!-- Formulaire modif infos
                                                                                                                                                        ============================================================ -->
                            <form method="POST" action="{{ route('user.update', $user) }}">
                                @csrf
                                @method('PUT')


                                <!-- Section name + prename
                                                                                                                                                        ============================================================ -->
                                <div class="d-flex justify-content-center gap-2">


                                    <!-- name
                                                                                                                                                        ============================================================ -->
                                    <div class="col mb-3">
                                        <label for="name"
                                            class="col-form-label ms-1"><small>{{ __('Nom') }}</small></label>

                                        <div class="col-md-12">
                                            <input id="name" type="text" placeholder="name"
                                                class="form-control @error('name') is-invalid @enderror" name="name"
                                                value="{{ $user->name }}" required autocomplete="name" autofocus>

                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>


                                    <!-- Prénom
                                                                                                                                                        ============================================================ -->
                                    <div class="col mb-3">
                                        <label for="first_name"
                                            class="col-form-label ms-1"><small>{{ __('Prénom') }}</small></label>

                                        <div class="col-md-12">
                                            <input id="first_name" type="text" placeholder="Prénom"
                                                class="form-control @error('Prénom') is-invalid @enderror" name="first_name"
                                                value="{{ $user->first_name }}" required autocomplete="first_name"
                                                autofocus>

                                            @error('prename')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <!-- Numéro de téléphone
                                                                                                                                                                                                                                                                    ============================================================ -->
                                    <div class="col mb-3">
                                        <label for="prename"
                                            class="col-form-label ms-1"><small>{{ __('Numéro de téléphone') }}</small></label>

                                        <div class="col-md-12">
                                            <input id="prename" type="text" placeholder="Préname"
                                                class="form-control @error('Prénom') is-invalid @enderror"
                                                name="phone_number" value="{{ $user->phone_number }}" required
                                                autocomplete="phone_number" autofocus>

                                            @error('prename')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>


                                </div>


                                <!-- Email
                                                                                                                                                        ============================================================ -->
                                <div class="col mb-3">
                                    <label for="email"
                                        class="col-form-label ms-1"><small>{{ __('E-mail') }}</small></label>

                                    <div class="col-md-12">
                                        <input id="email" type="email" placeholder="E-mail"
                                            class="form-control @error('email') is-invalid @enderror" name="email"
                                            value="{{ $user->email }}" required autocomplete="email">

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>


                                <!-- Bouton validation modification
                                                                                                                                                                    ============================================================ -->
                                <div class="row mb-0 mt-2">
                                    <div class="col-md-12">
                                        <button type="submit"
                                            class="btn ajoutValider col-12"><small>{{ __('Valider les modifications') }}</small></button>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- ======================================= Choisir adresse de livraison et de facturation ============================================ -->

        <form action="{{ route('choixCreneau') }}" method="POST" class="text-center">
            @csrf

            <label for="choixCreneau">Choisissiez un horaire</label>

            <input type="datetime-local" id="choixCreneau" name="choixCreneau"
                value="@if (session('choixCreneau')) {{ session()->get('choixCreneau') }}@else{{ date('Y-m-d\TH:i') }} @endif"
                min="{{ date('Y-m-d\TH:i') }}" max="{{ date('d-m-Y', strtotime(date('d-m-Y') . '+ 1 month')) }}\T00:00" />

            <button type="submit" class="ajoutValider btn btn-danger m-3">Choisir</button>
        </form>

        <td>
    </div>

    </td>


    <!-- ===================================================== BOUTON VALIDER LA COMMANDE ===================================================== -->

    <div class="d-flex justify-content-center">

        {{-- <!-- Button trigger modal --> l'opérateur && permet d'ajouter des conditions --}}
        @if (session('choixCreneau'))
            <a href="{{ route('commandes.store') }}">
                <button class="btn btn-danger validerCommande m-3">
                    Valider la commande
                </button>
            </a>
        @endif

    </div>
@endsection

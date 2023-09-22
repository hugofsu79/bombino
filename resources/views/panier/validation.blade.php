@extends('layouts.app')
@section('content')
    <div class="container">

        @if (session()->has('message'))
            <div class="alert alert-info">{{ session('message') }}</div>
        @endif

        @if (session()->has('panier'))
            <h1 class="text-center m-5">Valider ma commande</h1>
            <div class="table-responsive shadow mb-3">
                <table class="table table-bordered table-hover bg-white mb-0">
                    <thead class="thead-dark">
                        <tr>
                            <th style="background-color: #3F3028;color: white">#</th>
                            <th style="background-color: #3F3028;color: white">Produit</th>
                            <th style="background-color: #3F3028;color: white">Prix</th>
                            <th style="background-color: #3F3028;color: white">Quantité</th>
                            <th style="background-color: #3F3028;color: white">Total</th>
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

                                <td>{{ $article['price'] }} €</td>
                                <!--afficher le prix-->

                                <td>
                                    {{ $article['quantity'] }}
                                    <!--afficher la quantité-->
                                </td>

                                <td>
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
                                                                =========================================================== -->
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
                                                class="col-form-label ms-1"><small>{{ __('name') }}</small></label>

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


                                        <!-- first_name
                                                                            ============================================================ -->
                                        <div class="col mb-3">
                                            <label for="first_name"
                                                class="col-form-label ms-1"><small>{{ __('first_name') }}</small></label>

                                            <div class="col-md-12">
                                                <input id="prename" type="text" placeholder="first_name"
                                                    class="form-control @error('first_name') is-invalid @enderror"
                                                    name="first_name" value="{{ $user->first_name }}" required
                                                    autocomplete="prename" autofocus>

                                                @error('first_name')
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
                                                class="btn ajoutValider col-12"><small>{{ __('Valider mes informations') }}</small></button>
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <!-- ============================================================== TOTAL A PAYER ============================================================ -->

            <!-- On incrémente le total à payer -->
            @php$totalapayer = $total;
                        session()->put('totalapayer', $totalapayer); @endphp ?>

            <td>
                <!-- On affiche le total à payer avec un arrondi de 2 chiffres après la virgule -->
                <div class="text-center m-5">Total à payer :<strong>{{ number_format($totalapayer, 2, ',', ' ') }}
                        €</strong></div>

            </td>


            <!-- ===================================================== BOUTON VALIDER LA COMMANDE ===================================================== -->

            <div class="d-flex justify-content-center">

                {{-- <!-- Button trigger modal --> l'opérateur && permet d'ajouter des conditions --}}
                @if
                <button type="submit" name="clearCart" class="btn validerCommande m-3" data-bs-toggle="modal"
                    data-bs-target="#exampleModal">
                    Valider la commande
                </button>
        @endif

    </div>


    <!-- =========================================================== MODAL =========================================================== -->

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content text-center">
                <div class="modal-header">
                    <h1 class="modal-title fs-5 text-center" id="exampleModalLabel">Félicitations !</h1>
                    <button type="button" class="btn-close m-0" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Votre commande a été validée.</p>

                    <!-- ================= Afficher le montant total du panier ===================== -->

                    <p> Le montant total est de <strong>{{ number_format($totalapayer, 2, ',', ' ') }} €</strong>
                    </p>
                    <p>Récuperer la commande à partir de <?php
                    
                    // ===================  obtenir et afficher la date du jour formatée ===============
                    
                    $dateJour = date('d-m-Y');
                    echo $dateJour;
                    ?> </p>
                    <p>Commande prête à récupérer à
                        <?php
                        // Date et l'heure actuelles
                        $heureCommande = new DateTime('now');
                    
                        // Ajoutez 45 minutes pour l'heure de récupération
                        $heureRecuperation = clone $heureCommande;
                        $heureRecuperation->add(new DateInterval('PT45M'));// <- interval de 45minutes
                    
                        // Formatage des heures au format souhaité (Heure:Minute:Seconde)
                        $heureCommandeFormat = $heureCommande->format('H:i:s');
                        $heureRecuperationFormat = $heureRecuperation->format('H:i');
                    
                        echo $heureCommandeFormat . ' pour une récupération à ' . $heureRecuperationFormat;
                        ?>
                    </p>
                    
                    <p>Merci pour votre commande</p>
                </div>


                <!-- ========================================== BOUTON RETOUR A L'ACCUEIL =============================================== -->

                <div class="modal-footer d-flex justify-content-center">
                    <a href="{{ route('commandes.store') }}">
                        <button class="btn validerCommande m-3">
                            Retour à l'accueil
                        </button>
                    </a>
                </div>

            </div>
        </div>
    </div>
    @endif
    </div>
@endsection

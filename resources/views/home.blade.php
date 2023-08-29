@extends('layouts.app')

@section('content')

    <body>
        <section class="head_explanation">
            <h1 class="text-center">Les pizzas les plus napolitaines de Niort</h1>
        </section>

        <div class="menu">
            @foreach ($gammes as $gamme)
                <div class="container d-flex align-items-center">
                    <h3>{{ $gamme->name }}</h3>
                    <div class="row">
                        @foreach ($gamme->articles as $article)
                            <div class="produit  m-2">
                                <div class="p-4">
                                    <h2 class="name_produit">{{ $article->name }}</h2>
                                    <p>{{ $article->ingredients }}</p>
                                    <p class="allergens">{{ $article->allergens }}</p>
                                    <p>{{ $article->price }} €</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>


        {{-- <div> --}}
        {{-- <div class="col-md-4"> --}}
        {{-- <div> --}}
        {{-- <img class="rounded-1" src="{{ asset('images/' . $article->image) }}" alt="Image de l'article"> --}}

        {{-- <!-- boutton ajout au panier -->
                                <div class="container text-center">
                                    <div class="row text-center mt-1">
                                        <div class="col-md-12">
                                            {{-- <form method="POST" action="{{ route('panier.add', 1) }}" --}}
        {{-- class="form-inline d-inline-block"> --}}
        {{-- {{ csrf_field() }} --}}

        {{-- <input value="1" type="number" name="quantite" placeholder="Quantité ?" --}}
        {{-- class="form-control mr-2"> --}}
        {{-- </form> --}}
        {{-- </div> --}}

        {{-- <div class="col">

                                            <form method="POST" action="{{ route('panier.add', 1) }}"
                                                class="form-inline d-inline-block">
                                                {{ csrf_field() }}

                                                <button type="submit" class="ajoutValider btn">Ajouter au
                                                    panier</button>

                                            </form>

                                        </div> --}}

        {{-- <div class="col"> --}}
        {{-- <a href="{{ route('articles.show', $article) }}" class="m-1"> --}}
        {{-- <button class="btn btn-dark validerCommande">Détails --}}
        {{-- produit</button> --}}
        {{-- </a> --}}
        {{-- </div> --}}
        {{-- </div> --}}
        {{-- </div> --}}
        {{-- </div> --}}
        {{-- </div> --}}
        {{-- </div></div> --}}


        <section id="story">
            <div class="container">
                <p>Suivez Marco, natif de Naples, dans son aventure culinaire à "Bombino" à Niort. L'atmosphère résonne
                    de
                    l'âme
                    napolitaine, les parfums alléchants de la pizza napolitaine s'échappent du four. Chaque pizza est
                    une
                    palette de
                    saveurs, où la pâte moelleuse et la tomate fraîche dansent en harmonie. Au-delà de l'art culinaire,
                    Marco
                    partage l'héritage de son Italie, transformant les repas en expériences chaleureuses. "Bombino"
                    n'est
                    pas
                    simplement une pizzeria, mais une fenêtre ouverte sur l'authentique cuisine italienne.</p>
            </div>
        </section>

    </body>

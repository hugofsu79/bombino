@extends('layouts.app')

@section('content')
    <div class="header_style">
        <div class="bombi_sous">
            <div class="title_bombino">
                <div class="row">
                    <div class="col">
                        <img class="title_bombino" src="{{ asset('svg/bombino_blanc.svg') }}" alt="logo">
                    </div>
                    <div class="col"><a
                            href="https://www.google.com/maps/place/Bombino/@46.3306898,-0.471051,15z/data=!4m6!3m5!1s0x480731415ca8e08f:0xf6bc77dfa913a4e4!8m2!3d46.3259305!4d-0.4686005!16s%2Fg%2F11hwcv47b3?entry=ttu" target="_blank">
                            <h2 class="adresse" data-v-7df9fc40 class="adresse" target="_blank"
                                aria-label="Nous trouver sur Google Map">1 Rue Gambetta Niort</h2>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- <p>retrouvez l'histoire de bombino</p> --}}
    <section class="horaire d-flex align-items-center justify-content-center">
        <div class="row col-md-8">
            <h2 class="presentation pb-2">Les horaires</h2>
            <div class="col">
                <ul>
                    <h4>Dimanche</h4>
                    <li>12h00 à 13h50</li>
                    <li>19h00 à 22h00</li>
                </ul>
            </div>
            <div class="col">
                <ul>
                    <h4>Mardi</h4>
                    <li>19h00 à 22h00</li>
                </ul>
            </div>
            <div class="col">
                <ul>
                    <h4>Mercredi</h4>
                    <li>12h00 à 13h50</li>
                    <li>19h00 à 22h00</li>
                </ul>
            </div>
            <div class="col">
                <ul>
                    <h4>Jeudi</h4>
                    <li>12h00 à 13h50</li>
                    <li>19h00 à 22h00</li>
                </ul>
            </div>
            <div class="col">
                <ul>
                    <h4>Vendredi</h4>
                    <li>12h00 à 13h50</li>
                    <li>19h00 à 22h00</li>
                </ul>
            </div>
            <div class="col">
                <ul>
                    <h4>Samedi</h4>
                    <li>12h00 à 13h50</li>
                    <li>19h00 à 22h00</li>
                </ul>
            </div>
        </div>
    </section>

    <h1 class="title_menu">Menu</h1>

    <div class="gamme_chap p-1">
        @foreach ($gammes as $gamme)
            <a href="">
                <h4 class="gamme_title p-1" href="#{{ $gamme->name }}">{{ $gamme->name }}</h4>
            </a>
        @endforeach
    </div>

    <div class="menu">
        @foreach ($gammes as $gamme)
            <div class="ensemble_menu">
                <div class="container">
                    <div class="row">
                        <div class="col-md-2">
                            <div class="placeholder-content">
                                <section class="sticky-content">
                                    <h3 class="gamme_name">{{ $gamme->name }}</h3>
                                </section>
                            </div>
                        </div>

                        <div class="col">
                            <div class="articles-container">
                                @foreach ($gamme->articles as $article)
                                    <div class="produit  m-2 p-4">
                                        <div class="row">
                                            <div>
                                                <div class="row">
                                                    <div class="col-md-10">
                                                        <h1 class="name_produit">{{ $article->name }}</h1>
                                                    </div>
                                                    <div class="col align-self-center">
                                                        <h2>{{ $article->price }} €</h2>
                                                    </div>
                                                </div>
                                                <p>{{ $article->ingredients }}</p>
                                                <p class="allergens">{{ $article->allergens }}</p>
                                            </div>
                                            <div class="col text-center">
                                                <img class="photo_article rounded-1"
                                                    src="{{ asset('images/' . $article->image) }}" alt="Image de l'article">
                                            </div>
                                            <div class="col text-center">

                                                <!-- boutton ajout au panier -->
                                                <div class="container text-center">
                                                    <div class="row text-center mt-1">
                                                        <div class="col">

                                                            <form method="POST"
                                                                action="{{ route('panier.add', $article->id) }}"
                                                                class="form-inline d-inline-block">
                                                                @csrf
                                                                <input value="1" type="number" name="quantity"
                                                                    placeholder="Quantité ?" class="form-control mr-2">
                                                                <button type="submit"
                                                                    class="ajoutValider btn btn-danger mt-5">Ajouter
                                                                    au
                                                                    panier</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>


    <section class="story">
        <div class="container">
            <div class="row story">
                <div class="col">
                    <img class="marco_image" src="../images/marco.png" alt="marco" width="100%">
                </div>
                <div class="col col_texte">
                    <h2 class="presentation">Suivez Marco,</h2>
                    <p class="presentation_text">Natif de Naples, dans son aventure culinaire à "Bombino" à Niort.
                        L'atmosphère
                        résonne
                        de
                        l'âme
                        napolitaine, les parfums alléchants de la pizza napolitaine s'échappent du four. Chaque pizza
                        est
                        une
                        palette de
                        saveurs, où la pâte moelleuse et la tomate fraîche dansent en harmonie. Au-delà de l'art
                        culinaire,
                        Marco
                        partage l'héritage de son Italie, transformant les repas en expériences chaleureuses.
                        "Bombino"
                        n'est
                        pas
                        simplement une pizzeria, mais une fenêtre ouverte sur l'authentique italienne.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section class="livraison">
        <h3>Il est également possible d'être livré avec nos partenaires</h3>
    </section>
@endsection

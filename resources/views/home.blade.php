@extends('layouts.app')

@section('content')
    <div class="header_style  head_explanation">
        <div class="bombi_sous">
            <div class="title_bombino">
                <h1 class="bombino text-center">Bombino</h1>
                <h2 class="adresse">1 Rue Gambetta Niort</h2>
            </div>
        </div>
    </div>
    {{-- <p>retrouvez l'histoire de bombino</p> --}}


    <h1 class="title_menu">Menu</h1>

    <div class="gamme_chap p-1">
        @foreach ($gammes as $gamme)
            <a href=""><h4 class="gamme_title p-1" href="#{{ $gamme->name }}">{{ $gamme->name }}</h4></a>
        @endforeach
    </div>

    <div class="menu">
        @foreach ($gammes as $gamme)
            <div class="ensemble_menu">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3">
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
                                                <h2 class="name_produit">{{ $article->name }}</h2>
                                                <p>{{ $article->ingredients }}</p>
                                                <p class="allergens">{{ $article->allergens }}</p>
                                                <div class="col">
                                                    <p>{{ $article->price }} €</p>
                                                </div>
                                            </div>
                                            <div class="col text-center">
                                                <img class="photo_article rounded-1"
                                                    src="{{ asset('images/' . $article->image) }}" alt="Image de l'article">
                                            </div>
                                            <div class="col text-center">

                                                <!-- boutton ajout au panier -->
                                                <div class="container text-center">
                                                    <div class="row text-center mt-1">
                                                        <div class="col-md-12">
                                                            <form method="POST" action="{{ route('panier.add', 1) }}"
                                                                class="form-inline d-inline-block">
                                                                {{ csrf_field() }}

                                                                <input value="1" type="number" name="quantity"
                                                                    placeholder="Quantité ?" class="form-control mr-2">
                                                            </form>
                                                        </div>

                                                        <div class="col">

                                                            <form method="POST" action="{{ route('panier.add', 1) }}"
                                                                class="form-inline d-inline-block">
                                                                {{ csrf_field() }}

                                                                <button type="submit"
                                                                    class="ajoutValider btn btn-danger">Ajouter
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
                        <br>"Bombino"
                        n'est
                        pas
                        simplement une pizzeria, mais une fenêtre ouverte sur l'authentique italienne.
                    </p>
                </div>
            </div>
        </div>
    </section>
    <section class="horaire d-flex align-items-center justify-content-center">
        <div class="row col-md-8">
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
@endsection

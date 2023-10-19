@extends('layouts.app')
@section('content')
    <a href="#">
        <svg class="finger fixed-bottom m-5" id="Calque_2" data-name="Calque 2" xmlns="http://www.w3.org/2000/svg"
            viewBox="0 0 219.79 346.06">
            <defs>
                <style>
                    .cls-1 {
                        fill: none;
                        stroke: #151734;
                        stroke-linecap: round;
                        stroke-linejoin: round;
                        stroke-width: 11px;
                    }

                    .cls-2 {
                        fill: #faf5ed;
                        stroke-width: 0px;
                    }
                </style>
            </defs>
            <path class="cls-2"
                d="m214.05,159.38c-10.03,8.64-18.27,18.83-25.15,30.18-10.43,17.14-17.77,36.93-23.58,58.04l-24.82,4.14v48.94c0,53.18-114,53.18-114,0v-58.95c-12.75-9.59-21-24.85-21-42.04v-101.88c0-21.84,36-29.18,36-10.22.01-21.83,36-29.17,36-10.21,0-21.84,36-29.18,36-10.22V26.61c0-21.84,36-29.18,36-10.22v156.48c8.52-13.16,19.84-23.92,35.48-30.95,15.73-6.14,31.43-.08,29.07,17.46Z" />
            <g>
                <path class="cls-1" d="m149.5,172.86c-.96,1.47-1.87,2.97-2.76,4.5-.19.02-.38.05-.56.07" />
                <path class="cls-1" d="m113.5,168.16V26.61" />
                <path class="cls-1"
                    d="m61.5,252.24h-3.44c-11.85,0-22.78-3.91-31.56-10.52-12.75-9.59-21-24.85-21-42.04v-62.16" />
                <line class="cls-1" x1="113.5" y1="168.16" x2="113.5" y2="67.16" />
                <path class="cls-1" d="m26.5,241.72v58.95c0,53.19,114,53.19,114,0v-48.94" />
                <path class="cls-1" d="m79.48,230.65c0-28.37,15.22-48.22,66.7-53.22" />
                <path class="cls-1" d="m77.5,77.37c0-21.84,36-29.18,36-10.22" />
                <path class="cls-1"
                    d="m97.52,258.89l42.98-7.16,24.82-4.14c5.81-21.11,13.15-40.9,23.58-58.04,6.88-11.35,15.12-21.54,25.15-30.18,2.36-17.54-13.34-23.59-29.07-17.46-15.64,7.03-26.96,17.79-35.48,30.95V16.38c0-18.96-36-11.62-36,10.22" />
                <path class="cls-1"
                    d="m77.5,77.37v80.58c0,18.96-35.99,11.62-36-10.21v-60.16c.01-21.83,36-29.17,36-10.21Z" />
                <path class="cls-1" d="m41.5,87.58v60.16c0,18.96-36,11.62-36-10.22v-39.72c0-21.84,36-29.18,36-10.22Z" />
                <path class="cls-1" d="m77.5,157.95c0,21.84,36,29.18,36,10.22" />
            </g>

        </svg>
    </a>
    <div class="header_style">
        <div class="bombi_sous">
            <div class="title_bombino">
                <div class="row">
                    <div class="col">
                        <img class="title_bombino" src="{{ asset('svg/bombino_blanc.svg') }}" alt="logo">
                    </div>
                    <div class="adresse_maps col"><a
                            href="https://www.google.com/maps/place/Bombino/@46.3306898,-0.471051,15z/data=!4m6!3m5!1s0x480731415ca8e08f:0xf6bc77dfa913a4e4!8m2!3d46.3259305!4d-0.4686005!16s%2Fg%2F11hwcv47b3?entry=ttu"
                            target="_blank">
                            <h2 class="adresse" data-v-7df9fc40 class="adresse" target="_blank"
                                aria-label="Nous trouver sur Google Map">1 Rue Gambetta Niort</h2>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- <p>retrouvez l'histoire de bombino</p> --}}
    <section class="horaire text-center">
        <h2 class="horaires">Les horaires</h2>
        <div class="row">

            <div class="col">
                <ul>
                    <h4 class="font_hour">Dimanche</h4>
                    <li>12h00 à 13h50</li>
                    <li>19h00 à 22h00</li>
                </ul>
            </div>
            <div class="col">
                <ul>
                    <h4 class="font_hour">Mardi</h4>
                    <li>19h00 à 22h00</li>
                </ul>
            </div>
            <div class="col">
                <ul>
                    <h4 class="font_hour">Mercredi</h4>
                    <li>12h00 à 13h50</li>
                    <li>19h00 à 22h00</li>
                </ul>
            </div>
            <div class="col">
                <ul>
                    <h4 class="font_hour">Jeudi</h4>
                    <li>12h00 à 13h50</li>
                    <li>19h00 à 22h00</li>
                </ul>
            </div>
            <div class="col">
                <ul>
                    <h4 class="font_hour">Vendredi</h4>
                    <li>12h00 à 13h50</li>
                    <li>19h00 à 22h00</li>
                </ul>
            </div>
            <div class="col">
                <ul>
                    <h4 class="font_hour">Samedi</h4>
                    <li>12h00 à 13h50</li>
                    <li>19h00 à 22h00</li>
                </ul>
            </div>
        </div>
    </section>

    <h1 class="title_menu">Menu</h1>

    <div class="gamme_chap p-1">
        @foreach ($gammes as $gamme)
            <a class="gamme_title p-1" href="#{{ $gamme->name }}">
                {{ $gamme->name }}
            </a>
        @endforeach
    </div>

    <div class="menu">
        @foreach ($gammes as $gamme)
            <div class="ensemble_menu">
                <div class="row">
                    <div class="col-md-2">
                        <section class="sticky-content">
                            <h3 class="gamme_name">{{ $gamme->name }}</h3>
                        </section>
                    </div>

                    <div class="col">
                        <div class="articles-container">
                            @foreach ($gamme->articles as $article)
                                <div class="produit m-2 p-4">
                                    <div class="row">

                                        <div class="col-md-6">
                                            <img class="photo_article" src="{{ asset('images/' . $article->image) }}"
                                                alt="Image de l'article">
                                        </div>
                                        <div class="col">
                                                <div class="detail_article row">
                                                    <div class="col-md-10">
                                                        <h2 class="name_produit">{{ $article->name }}</h2>
                                                    </div>
                                                    <div class="col align-self-center">
                                                        <h2>{{ $article->price }} €</h2>
                                                    </div>
                                                </div>
                                                <div class="col-md-10">
                                                    <p class="ingredients">{{ $article->ingredients }}</p>
                                                </div>
                                                <p class="allergens">{{ $article->allergens }}</p>

                                                <div class="col">

                                                    <form method="POST" action="{{ route('panier.add', $article->id) }}"
                                                        class="form-inline d-inline-block">
                                                        @csrf
                                                        <input value="1" type="number" name="quantity"
                                                            placeholder="Quantité ?"
                                                            class="quantity_menu form-control mr-2">
                                                        <button type="submit"
                                                            class="ajoutValider btn btn-danger mt-5 col-md-12">Ajouter
                                                            au
                                                            panier</button>
                                                    </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
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
    <section class="livraison p-3">
        <a class="delivroo" href="https://deliveroo.fr/fr/menu/Niort/niort-centre-ville/bombino/?geohash=gbpxt2vx1z6c"
            target="_blank">
            <img src="{{ asset('svg/deliveroo-logo.svg') }}" alt="" width="50%"
                class="justify-content-center align-items-center">
        </a>
        <div class="card_livraison row">
            <div class="col">
                <img class="rounded-3" src="{{ asset('images/livraison.jpg') }}" width="70%">
            </div>
            <div class="col">
                <h1 class="livraison_ecriture">Bombino</h1>
                <p style="color:#00CCBC">Italien • Pizza • Vin</p>
                <p>À 0.38 km • Ouvre à 12:00 • 10,00 € minimum •Livraison offerte</p>
                <div>
                    <h2>Informations</h2>
                    <p>Allergènes et plus</p>
                </div>
                <div>
                    <h2 style="color:#00CCBC">4,2 Bien</h2>
                    <p>Voir les 44 avis</p>
                </div>
                <div class="row">
                    <div class="col">
                        <h2>livraison</h2>
                    </div>
                    <div class="col">
                        <h2 style="color:#00CCBC">Modifier</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="job">
        <h2 class="h2_job pb-3">Nous rejoindre</h2>
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="card_job card">
                        <div class="card-body">
                            <h5 class="card-title"><b>Pizzaiolo/pizzaiola</b></h5>
                            <p class="card-text">
                                {{ __('Vous aimez la cuisine ? Le contact clientèle ? Vincenzo Pizza recherche
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                un.e pizzaïolo.a motivé.e et autonome pour son camion à pizzas. Vos missions seront les
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                suivantes : - Confection de la pâte...') }}
                            </p>
                            {{-- <a href="#" class="btn btn-primary">Voir l'annonce</a> --}}
                        </div>
                    </div>
                </div>
                <div class="col card_job card">
                    <div class="card-body">
                        <h5 class="card-title"><b>Serveur(se)</b></h5>
                        <p class="card-text">
                            {{ __('Accompagné(e) par l\'équipe de salle, vous apporterez tous les soins nécessaires au bon fonctionnement du service.
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            Vous aimez le relationnel, le challenge commercial, ...') }}
                        </p>
                        {{-- <a href="#" class="btn btn-primary">Voir l'annonce</a> --}}
                    </div>
                </div>

            </div>
        </div>
        <div class="formulaire_candidature" method="post">
            <form>
                <div class="container pt-5">
                    <div class="row">
                        <div class="col">
                            <label for="name">Nom :</label>
                            <input autocomplete="name" type="text" id="ContactForm-name" name="contact[Nom]"
                                class="form-control" placeholder="Nom" required="required">
                        </div>
                        <div class="col">
                            <label for="prenom">Prénom :</label>
                            <input autocomplete="first_name" type="text" id="ContactForm-firstName"
                                name="contact[Prenom]" class="form-control" placeholder="Prénom" required="required">
                        </div>
                    </div>
                    <div class="row pt-5">
                        <div class="col-md-4">
                            <label for="diplome">Diplôme :</label>
                            <input autocomplete="diplome" type="text" id="ContactForm-diplome"
                                name="contact[diplome]" class="form-control" placeholder="Diplome" required="required">
                        </div>
                        <div class="col">
                            <label for="email">Adresse e-mail :</label>
                            <input type="text" id="email" class="form-control" placeholder="email">
                        </div>
                    </div>
                    <div class="mt-3 pt-5">
                        <div class="col">
                            <label for="motivation">Motivation :</label>
                        </div>
                        <div class="form-floating">
                            <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 150px"></textarea>
                        </div>
                    </div>
                    <div class="send_candidature">
                        <input class="btn btn-danger mt-3" type="submit" value="Envoyer la Candidature"
                            href="mailto:hugo266@icloud.com">
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection

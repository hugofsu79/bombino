@extends('layouts.app')

@section('content')
    <h2 class="text-center"> BACK OFFICE </h2>

    <!-- SECTION CREATION ARTICLE
                                                                                                        ============================================================ -->

    <form action="{{ route('articles.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div id="section_cration_article">
            <div class="container-fluid pt-5">
                <!-- Titre section -->
                <h4 class="text-center">Enregistrer un article</h4>
                <div class="container pl-5 pr-5">
                    <form class="register_article row g-3">
                        <div class="col">
                            <div class="row">
                                <div class="col">
                                    <label for="name"
                                        class="col-form-label ms-1"><small>{{ __('Nom') }}</small></label>
                                    <input id="name" type="text" placeholder="name"
                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                        value="{{ old('Nom') }}" required>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col">
                                    <input id="image" type="file"
                                        class="form-control @error('image') is-invalid @enderror" name="image"
                                        placeholder="image.jpg" value="{{ old('image') }}" autocomplete="image" required>

                                    @error('image')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <label for="ingredients"
                                    class="col-form-label ms-1"><small>{{ __('Ingredients') }}</small></label>

                                <div class="col-md-12">
                                    <input id="ingredients" type="text" placeholder="ingredients"
                                        class="form-control @error('ingredients') is-invalid @enderror" name="ingredients"
                                        value="{{ old('Ingredients') }}" required>

                                    @error('descritpion')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <label for="price" class="col-form-label ms-1"><small>{{ __('Prix') }}</small></label>

                                <div class="col-md-12">
                                    <input id="price" type="number" placeholder="Prix"
                                        class="form-control @error('price') is-invalid @enderror" name="price"
                                        value="{{ old('Prix') }}" required>

                                    @error('price')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">

                                <!-- Example single danger button -->
                                <div class="btn-group col-md-12 m-4">
                                    <button type="button" class="btn btn-danger dropdown-toggle" data-bs-toggle="dropdown"
                                        aria-expanded="false">
                                        Gammes
                                    </button>
                                    <ul class="dropdown-menu">
                                        @foreach ($gammes as $gamme)
                                            <li><a class="dropdown-item" value="{{ $gamme->id }}"
                                                    href="#">{{ $gamme->name }}</a></li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-danger col" id="button_validation_enregistrement"><small
                                    class="text-light">{{ __('Enregistrer') }}</small>
                            </button>
                    </form>
                </div>
            </div>
    </form>



    <!-- SECTION GESTION ARTICLES
                                                                                                            ============================================================ -->
    <!-- Titre section -->
    <h4 class="text-center mt-5">Gestion des articles</h4>
    <div class="container-fluid p-4 rounded-2 border-dark justify-content-center" id="section_gestion_articles">
        <div class="row justify-content-center">
            <div class="col">


                <!-- TABLE
                                                                                                                        ============================================================ -->
                <div>
                    <table class="table border-dark">

                        <!-- TITRE DES COLONNES
                                                                                                                                ============================================================ -->
                        <thead>
                            <tr class="table table-dark table-striped text-center">
                                <!-- name -->
                                <th scope="col">Nom</th>
                                <!-- name -->
                                <th scope="col">Gamme</th>
                                <!-- ingredients -->
                                <th scope="col">ingredients</th>
                                <!-- highlighted -->
                                <th scope="col">Produit du mois</th>
                                <!-- allergies -->
                                <th scope="col">Allergie</th>
                                <!-- Image -->
                                <th scope="col">Image</th>
                                <!-- price -->
                                <th scope="col">price</th>
                                <!-- Boutton modifier -->
                                <th scope="col">Modifier</th>
                                <!-- Boutton Supprimer -->
                                <th scope="col">Supprimer</th>
                            </tr>
                        </thead>

                        <!-- BOUCLE AFFICHAGE INFOS ARTICLES
                                                                                                                                ============================================================ -->
                        @foreach ($articles as $article)
                            <!-- ARTICLES
                                                                                                                                    ============================================================ -->
                            <tbody>
                                <tr class="table table-dark table-striped">
                                    <!-- name -->
                                    <td class="fs-5">{{ $article->name }}</td>
                                    <!-- name -->
                                    <td class="fs-5">{{ $gamme->name }}</td>
                                    <!-- ingredients -->
                                    <td>{{ $article->ingredients }}</td>
                                    <!-- highlighted -->
                                    <th scope="col">
                                        <label class="switch">
                                            <input type="checkbox">
                                            <span class="slider round"></span>
                                        </label>
                                    </th>
                                    <!-- ingredients -->
                                    <td>{{ $article->allergens }}</td>
                                    <!-- Image -->
                                    <td class="text-center"><img src="{{ asset('images/' . $article->image) }}"
                                            class="rounded-top" alt="{{ $article->name }}" style="width: 7rem"></td>
                                    <!-- price -->
                                    <td class="text-center">{{ $article->price }} €</td>
                                    <!-- Boutton modifier -->
                                    <td>
                                        <a href="{{ route('articles.edit', $article) }}">
                                            <button type="button mx-auto" class="btn btn-outline-secondary text-light"
                                                id="button_modif">Modifier</button>
                                        </a>
                                    </td>
                                    <!-- Boutton supprimer -->
                                    <td>
                                        <form action="{{ route('articles.destroy', $article) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger">Supprimer</button>
                                        </form>
                                    </td>
                                </tr>
                            </tbody>
                        @endforeach

                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- SECTION CREATION GAMMES
                                                                                                        
@section('content')
                                                                                                    <h3 class="text-center mx-auto">
                                                                                                            Backoffice</h3>

                                                                                                        <div class="mx-auto text-center">
                                                                                                            <form class="p-3" action="{{ route('gammes.store') }}" method="POST">
                                                                                                                @csrf
                                                                                                                <!---Champs du formulaire -->
    <input type="text" name="name" placeholder="name de la gamme">

    <!-- Bouton de soumission -->
    <button type="submit">Ajouter</button>
    </form>
    <div class="mx-auto text-center">

        <h4 class="p-2">Liste des gammes</h4>

        <div class="container">
            <table class="table table-dark table-striped">
                <thead>
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">name</th>
                        <th scope="col">Modifier</th>
                        <th scope="col">Supprimer</th>
                    </tr>
                </thead>

                <div class="form-group">


                    <tbody>
                        @foreach ($gammes as $gamme)
                            <tr>
                                <th scope="row">{{ $gamme->id }}</th>
                                <td>{{ $gamme->name }}</td>

                                <td>
                                    <a href="{{ route('gammes.edit', $gamme) }}">
                                        <button class="style_button btn btn-primary rounded-pill m-1">Modifier</button>
                                    </a>
                                </td>

                                <td>
                                    <form action="{{ route('gammes.destroy', $gamme) }}" method="post">
                                        @method ("delete")
                                        @csrf
                                        <button type="submit"
                                            class="style_button btn btn-danger  rounded-pill  m-1">Supprimer</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </div>
            </table>
        </div>
    </div>
    </div>

    <!-- Créer une gamme -->

    <div class="container w-50 p-5" style="display:none" id="rangesForm">
        <h4>Créer une gamme</h4>
        <form method="post" action="{{ route('gammes.store') }}">
            @csrf
            <div class="form-group">
                <label for="name">name</label>
                <input required type="text" class="form-control" name="name" placeholder="moulin à café"
                    id="name">
            </div>
            <button type="submit" class="btn btn-info text-light mt-4">Valider</button>
        </form>
    </div>



    <!-- Liste des gammes -->

    <div class="container w-50 p-5" style="display:none" id="rangesList">
        <h4 class="mb-3">Liste des gammes</h4>

        <table class="table table-info">
            <thead class="thead-dark">
                <th>id</th>
                <th>name</th>
                <th>modifier</th>
                <th>supprimer</th>
            </thead>
            @foreach ($gammes as $gamme)
                <tr>
                    <td>{{ $gamme->id }}</td>
                    <td>{{ $gamme->name }}</td>
                    <td><a href="{{ route('gammes.edit', $gamme) }}"><button
                                class="btn btn-warning">Modifier</button></a>
                    </td>
                    <td>
                        <form method="post" action="{{ route('gammes.destroy', $gamme) }}">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>


                        <!-- Modification des horaires
                                                                                                                                ============================================================ -->
@endsection

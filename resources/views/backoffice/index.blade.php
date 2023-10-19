@extends('layouts.app')

@section('content')
    <script>
        let adminTableaux = ['articlesForm', 'gammeForm', 'articlesList', 'usersList'

        ]

        function showElement(elementId) {

            adminTableaux.forEach(element => { // nom du tableau 
                document.getElementById(element).style.display = 'none'
            });

            let element = document.getElementById(elementId);

            // écriture ternaire
            element.style.display == "block" ? element.style.display = "none" : element.style.display = "block";

            // autre écriture
            // if (element.style.display == "block" ){
            //     element.style.display = "none" p
            // } else {
            //     element.style.display = "block"
            // }
        }
    </script>


    <h1 class=" text-center pb-5 pt-5 mt-5">Back-office</h1>
    <div class="rack container align-self-center">

        <div class="arborescence row justify-content-around text-center align-self-center">
            <div class="col">
                <button onclick="showElement('articlesForm')">Créer un article</button>
            </div>
            <div class="col">
                <button onclick="showElement('articlesList')">Liste des articles</button>
            </div>
            <div class="col">
                <button onclick="showElement('gammeForm')">Les gammes</button>
            </div>
            <div class="col">
                <button onclick="showElement('usersList')">Liste des
                    utlisateurs</button>
            </div>
        </div>

        <!-- SECTION CREATION ARTICLE
                                                                                                                                                                                                                                        ============================================================ -->

        <!-- Titre section -->
        <div class="container" style="display:none" id="articlesForm">
            <h4 class="text-center">Enregistrer un article</h4>
            <form action="{{ route('articles.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div id="section_cration_article">
                    <div class="container-fluid pt-5">
                        <div class="register_article row g-3">
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
                                            placeholder="image.jpg" value="{{ old('image') }}" autocomplete="image"
                                            required>

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
                                            class="form-control @error('ingredients') is-invalid @enderror"
                                            name="ingredients" value="{{ old('Ingredients') }}" required>

                                        @error('ingredients')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror


                                        <label for="Allergène"
                                            class="col-form-label ms-1"><small>{{ __('Allergène') }}</small></label>
                                        <input id="allergens" type="text" placeholder="Allergène(s)"
                                            class="form-control @error('allergens') is-invalid @enderror" name="allergens"
                                            value="{{ old('Allergène(s)') }}" required>

                                        @error('allergens')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>


                                </div>
                                <div class="col-12">
                                    <label for="price"
                                        class="col-form-label ms-1"><small>{{ __('Prix') }}</small></label>

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

                                <!-- Example single danger button -->


                                <div class="col-12">
                                    <label for="gamme"
                                        class="col-form-label ms-1"><small>{{ __('Gamme') }}</small></label>

                                    <div class="col-md-12 text-center">
                                        <select class="gamme_id p-1" name="gamme_id" id="gamme_id">
                                            <option value=""> Choisissez une gamme </option>
                                            @foreach ($gammes as $gamme)
                                                <option value="{{ $gamme->id }}">{{ $gamme->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-danger" id="button_validation_enregistrement"><small
                                    class="text-light">{{ __('Enregistrer') }}</small>
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <!-- Titre section -->
        <div style="display:none" id="articlesList">
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

                                        <!-- allergies -->
                                        <th scope="col">Allergie</th>
                                        <!-- Image -->
                                        <th scope="col">Image</th>
                                        <!-- price -->
                                        <th scope="col">Prix</th>
                                        <!-- Boutton modifier -->
                                        <th scope="col">Modifier</th>
                                        <!-- Boutton Supprimer -->
                                        <th scope="col">Supprimer</th>
                                    </tr>
                                </thead>

                                <!-- BOUCLE AFFICHAGE INFOS ARTICLES
                                                                                                                                                                                                                                                                ============================================================ -->


                                <tbody>
                                    @foreach ($articles as $article)
                                        <!-- ARTICLES
                                                                                                                                                                                                                                                                    ============================================================ -->
                                        <tr class="table table-dark table-striped">
                                            <!-- name -->
                                            <td class="fs-5">{{ $article->name }}</td>
                                            <!-- gamme -->
                                            <td class="fs-5">{{ $article->gamme->name }}</td>
                                            <!-- ingredients -->
                                            <td>{{ $article->ingredients }}</td>
                                            <!-- ingredients -->
                                            <td>{{ $article->allergens }}</td>
                                            <!-- Image -->
                                            <td class="text-center"><img src="{{ asset('images/' . $article->image) }}"
                                                    class="rounded-top" alt="{{ $article->name }}" style="width: 7rem">
                                            </td>
                                            <!-- price -->
                                            <td class="text-center">{{ $article->price }} €</td>
                                            <!-- Boutton modifier -->
                                            <td>
                                                <a href="{{ route('articles.edit', $article) }}">
                                                    <button type="button mx-auto"
                                                        class="btn btn-outline-secondary text-light"
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
                                    @endforeach
                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- SECTION CREATION GAMMES -->
        <div class="container" style="display:none" id="gammeForm">
            <h4 class="text-center mx-auto mt-5">Créer une gamme</h4>
            <div class="mx-auto text-center">
                <form class="p-3" action="{{ route('gammes.store') }}" method="POST">@csrf
                    <input class="gamme_creat rounded-start-pill" type="text" name="name" placeholder="Gamme">

                    <!-- Bouton de soumission -->
                    <button type="submit" class="btn btn-primary">Ajouter</button>
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
                                                    <button
                                                        class="style_button btn btn-primary rounded-pill m-1">Modifier</button>
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
                <h3>Créer une gamme</h3>
                <form method="post" action="{{ route('gammes.store') }}">
                    @csrf
                    <div class="form-group">
                        <label for="nom">nom</label>
                        <input required type="text" class="form-control" name="nom" placeholder="moulin à café"
                            id="nom">
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
        </div>

        {{-- Liste des clients --}}

        <div class="container pt-5" id="usersList" style="display:none" id="usersList">
            <h4>Liste des utilisateurs</h4>

            <table class="table table-dark">
                <thead class="thead-dark">
                    <th>id</th>
                    <th>Role</th>
                    <th>nom</th>
                    <th>prénom</th>
                    <th>e-mail</th>
                    <th>Numéro de téléphone</th>
                    <th>supprimer</th>
                </thead>
                @foreach ($users as $user)
                    <tr class="text-center">
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->role->role }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->first_name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->phone_number }}</td>
                        <td>
                            <form method="post" action="{{ route('user.destroy', $user) }}">
                                @csrf
                                @method('delete')
                                {{-- <input type="hidden" value="{{ $user->id }}" name="userId"> --}}
                                <button type="submit" class="btn btn-danger">Supprimer</button>
                            </form>

                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>


    <!-- Modification des horaires
                                                                                                                                                                                                                                                        ============================================================ -->
@endsection

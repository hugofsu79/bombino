@extends('layouts.app')

@section('title')
    Modification article
@endsection

@section('content')
    <!-- SECTION MODIF ARTICLE
                                                ============================================================ -->
    <div class="container-fluid pt-5 mt-5" id="section_modif_article">
        <!-- Titre section -->
        <h1 class="text-center">Modifier l'article {{ $article->name }}</h1>
        <div class="row justify-content-center">
            <div class="col-md-5">


                <!-- CARD
                                                            ============================================================ -->
                <div class="text-light mt-1">


                    <!-- CARD HEADER
                                                                ============================================================ -->


                    <!-- CARD BODY
                                                                ============================================================ -->
                    <div class="card-body" id="body_card_edit">


                        <!-- FORMULAIRE CREATION ARTICLE
                                                                    ============================================================ -->
                        <form action="{{ route('articles.update', $article) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')


                            <!-- SECTION name + IMAGE
                                                                        ============================================================ -->
                            <div class="d-flex justify-content-center gap-2">


                                <!-- Nom
                                                                            ============================================================ -->
                                <div class="col mb-3">
                                    <label for="name" class="col-form-label ms-1"><small>
                                            <h3>{{ __('Nouveau nom') }}</h3>
                                        </small></label>

                                    <div class="col-md-12">
                                        <input id="name" required type="text" placeholder="name"
                                            class="form-control @error('name') is-invalid @enderror" name="name"
                                            value="{{ $article->name }}">

                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>


                                <!-- IMAGE
                                                                            ============================================================ -->
                                <div class="col mb-3">
                                    <label for="image" class="col-form-label ms-1"><small>
                                            <h3>{{ __('Nouvelle image') }}</h3>
                                        </small></label>

                                    <div class="col-md-12">
                                        <input id="image" type="file"
                                            class="form-control @error('image') is-invalid @enderror" name="image"
                                            placeholder="image.jpg" value="{{ $article->image }}" autocomplete="image">

                                        @error('image')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                            </div>



                            <!-- INGREDIENTS
                                                                        ============================================================ -->
                            <div class="col mb-3">
                                <label for="ingredients" class="col-form-label ms-1"><small>
                                        <h3>{{ __('Nouveaux ingrédients') }}</h3>
                                    </small></label>

                                <div class="col-md-12">
                                    <input id="ingredients" required type="text" placeholder="ingredients"
                                        class="form-control @error('description_detaillee') is-invalid @enderror"
                                        name="ingredients" value="{{ $article->ingredients }}">

                                    @error('description_detaillee')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <!-- INGREDIENTS
                                                                                                ============================================================ -->
                            <div class="col mb-3">
                                <label for="allergens" class="col-form-label ms-1"><small>
                                        <h3>{{ __('Allergène') }}</h3>
                                    </small></label>

                                <div class="col-md-12">
                                    <input id="allergens"  required type="text" placeholder="ingredients"
                                        class="form-control @error('description_detaillee') is-invalid @enderror"
                                        name="allergens" value="{{ $article->allergens }}">

                                    @error('allergens')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>


                                


                            <!-- SECTION price
                                                                        ============================================================ -->
                            <div class="d-flex justify-content-center gap-2">


                                <!-- price
                                                                            ============================================================ -->
                                <div class="col">
                                    <label for="price" class="col-form-label ms-1"><small>
                                            <h3>{{ __('Nouveau prix') }}</h3>
                                        </small></label>

                                    <div class="col-md-12">
                                        <input id="price" required type="number" placeholder="price"
                                            class="form-control @error('price') is-invalid @enderror" name="price"
                                            value="{{ $article->price }}">

                                        @error('price')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                            </div>
                            <!-- choix de la gamme
                                                                        ============================================================ -->
                            

                            <div class="col-12">
                                <label for="gamme"
                                    class="col-form-label ms-1"><small>{{ __('Gamme') }}</small></label>

                                <div class="col-md-12 text-center">
                                    <select class="p-1" required name="gamme_id" id="gamme_id">
                                        <option value=""> Choisissez une gamme </option>
                                        @foreach ($gammes as $gamme)
                                            <option @if($article->gamme_id == $gamme->id) selected @endif value="{{ $gamme->id }}">{{ $gamme->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <!-- BOUTTON VALIDATION ENREGISTREMENT
                                                                        ============================================================ -->
                            <div class="row mt-4">
                                <div class="col-md-12">
                                    <button class="btn btn-danger" type="submit"
                                        class="btn col-12 border-secondary"><small>{{ __('Valider la modification') }}</small></button>
                                </div>
                            </div>

                        </form>
                    </div>

                </div>

            </div>
        </div>
    </div>
@endsection

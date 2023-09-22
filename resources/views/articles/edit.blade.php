@extends('layouts.app')

@section('title')
    Modification article
@endsection

@section('content')
    <!-- SECTION MODIF ARTICLE
            ============================================================ -->
    <div class="container-fluid pt-5" id="section_modif_article">
        <!-- Titre section -->
        <h2 class="text-center">Modifier l'article {{ $article->name }}</h2>
        <div class="row justify-content-center">
            <div class="col-md-5">


                <!-- CARD
                        ============================================================ -->
                <div class="card border-secondary text-light mt-1">


                    <!-- CARD HEADER
                            ============================================================ -->
                    <div class="card-header border-bottom border-secondary d-flex justify-content-between"
                        id="header_card_edit">

                        <small>{{ __('Modification article') }} {{ $article->name }}</small>

                        <a href="{{ route('backoffice') }}">
                            <i class="fa-solid fa-xmark text-light fs-5"></i>
                        </a>

                    </div>


                    <!-- CARD BODY
                            ============================================================ -->
                    <div class="card-body" id="body_card_edit">


                        <!-- FORMULAIRE CREATION ARTICLE
                                ============================================================ -->
                        <form action="{{ route('articles.update', $article) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')


                            <!-- SECTION name + IMAGE
                                    ============================================================ -->
                            <div class="d-flex justify-content-center gap-2">


                                <!-- Nom
                                        ============================================================ -->
                                <div class="col mb-3">
                                    <label for="name"
                                        class="col-form-label ms-1"><small>{{ __('Nouveau name') }}</small></label>

                                    <div class="col-md-12">
                                        <input id="name" type="text" placeholder="name"
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
                                    <label for="image"
                                        class="col-form-label ms-1"><small>{{ __('Nouvelle image') }}</small></label>

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


                            <!-- DESCRIPTION
                                    ============================================================ -->
                            <div class="col mb-3">
                                <label for="description"
                                    class="col-form-label ms-1"><small>{{ __('Nouvelle description') }}</small></label>

                                <div class="col-md-12">
                                    <input id="description" type="text" placeholder="Description"
                                        class="form-control @error('descritpion') is-invalid @enderror" name="description"
                                        value="{{ $article->description }}">

                                    @error('descritpion')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>


                            <!-- DESCRIPTION DETAILLEE
                                    ============================================================ -->
                            <div class="col mb-3">
                                <label for="description_detaillee"
                                    class="col-form-label ms-1"><small>{{ __('Nouvelle descritpion détaillée') }}</small></label>

                                <div class="col-md-12">
                                    <input id="description_detaillee" type="text" placeholder="Description détaillée"
                                        class="form-control @error('description_detaillee') is-invalid @enderror"
                                        name="description_detaillee" value="{{ $article->description_detaillee }}"></input>

                                    @error('description_detaillee')
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
                                <div class="col mb-3">
                                    <label for="price"
                                        class="col-form-label ms-1"><small>{{ __('Nouveau price') }}</small></label>

                                    <div class="col-md-12">
                                        <input id="price" type="number" placeholder="price"
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

                            <div class="toggleWrapper">
                                <input type="checkbox" name="toggle1" class="mobileToggle" id="toggle1" checked>
                                <label for="toggle1"></label>
                            </div>

                            <div class="toggleWrapper">
                                <input type="checkbox" name="toggle2" class="mobileToggle" id="toggle2">
                                <label for="toggle2"></label>
                            </div>

                            <!-- BOUTTON VALIDATION ENREGISTREMENT
                                    ============================================================ -->
                            <div class="row mt-4">
                                <div class="col-md-12">
                                    <button type="submit" class="btn col-12 border-secondary"><small
                                            class="text-light">{{ __('Valider la modification') }}</small></button>
                                </div>
                            </div>

                        </form>
                    </div>

                </div>

            </div>
        </div>
    </div>
@endsection

@extends('layouts.app')

@section('title')
    Modification article
@endsection

@section('content')
    <!-- SECTION MODIF ARTICLE
                    ============================================================ -->
    <div class="container-fluid pt-5" id="section_modif_article">
        <!-- Titre section -->
        <h2 class="text-center">Modifier la gamme {{ $gamme->name }}</h2>
        <div class="row justify-content-center">
            <div class="col-md-5">


                <!-- CARD
                                ============================================================ -->
                <div class="card border-secondary text-light mt-1">


                    <!-- CARD HEADER
                                    ============================================================ -->
                    <div class="card-header border-bottom border-secondary d-flex justify-content-between"
                        id="header_card_edit">

                        <small>{{ __('Modification Gamme') }} {{ $gamme->name }}</small>

                        <a href="{{ route('admin') }}">
                            <i class="fa-solid fa-xmark text-light fs-5"></i>
                        </a>

                    </div>


                    <!-- CARD BODY
                                    ============================================================ -->
                    <div class="card-body" id="body_card_edit">


                        <!-- FORMULAIRE CREATION ARTICLE
                                        ============================================================ -->
                        <form action="{{ route('gammes.update', $gamme) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="col mb-3">
                                <label for="name"
                                    class="col-form-label ms-1"><small>{{ __('Nouveau nom') }}</small></label>

                                <div class="col-md-12">
                                    <input id="name" type="text" placeholder="name"
                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                        value="{{ $gamme->name }}">

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <!-- BOUTTON VALIDATION ENREGISTREMENT
                                            ============================================================ -->
                            <div class="row mt-4">
                                <div class="col-md-12">
                                    <button type="submit" class="btn col-12 border-secondary"><small
                                            class="text-light">{{ __('Valider la gamme') }}</small></button>
                                </div>
                            </div>

                           

                        </form>
                    </div>

                </div>

            </div>
        </div>
    </div>
@endsection

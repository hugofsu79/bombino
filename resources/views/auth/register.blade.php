@extends('layouts.app')

@section('content')
    <div class="register container pt-5">
        <div class="card_register row justify-content-center">
            <div class="col-md-8">
                <div class="justify-content-center">
                    <h1 class="p-2" class="register_title">
                        <h1 class="register_title p-2">{{ __('S\'inscrire') }}</h1>

                    <div>
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            {{-- name --}}
                            <div class="row mb-3">
                                <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Nom') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                        value="{{ old('name') }}" required autocomplete="name" placeholder="Finkielkraut" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- First_name --}}
                            <div class="row mb-3">
                                <label for="first_name" 
                                    class="col-md-4 col-form-label text-md-end">{{ __('Prénom') }}</label>

                                <div class="col-md-6">
                                    <input id="first_name" type="text"
                                        class="form-control @error('first_name') is-invalid @enderror" name="first_name"
                                        value="{{ old('name') }}"  placeholder="Alain" required autocomplete="first_name" autofocus>

                                    @error('first_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- Phone_number --}}
                            <div class="row mb-3 d-flex align-items-center">
                                <label for="phone_number" 
                                    class="col-md-4 col-form-label text-md-end " >{{ __('Numéro de téléphone') }}</label>

                                <div class="col-md-6">
                                    <input id="phone_number" type="tel"
                                        class="form-control @error('phone_number') is-invalid @enderror" name="phone_number"
                                        value="{{ old('phone_number') }}" placeholder="06..." required autocomplete="phone_number" autofocus>

                                    @error('phone_number')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- E-mail --}}
                            <div class="row mb-3">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-end">{{ __('e-mail') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" placeholder="bombino@bombino.fr" required autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- Password --}}
                            <div class="row mb-3">
                                <label for="password"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Mot de passe') }} </label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Mot de passe" 
                                        required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password-confirm"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Confirmez le mot de passe') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" placeholder="Mot de passe"  class="form-control"
                                        name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            {{-- RGPD --}}

                            <div class="form-grou row text-center">
                                <div class="col-md-10">
                                    <label for="politique">J'ai lu et j'accepte les
                                        <a href="{{ route('politique') }}" target="_blank">mentions légales et la politique de
                                            confidentialité</a>
                                    </label>
                                </div>

                                <label class="switch">
                                    <input type="checkbox" type="checkbox" name="politique" id="politique"
                                        onclick="toggleValidationButtonDisplay()">
                                    <span class="slider round"></span>
                                </label>
                            </div>

                            {{-- Bouton "Valider" --}}
                            <div class="row mb-0">
                                <div class="offset-md-4 pt-3">
                                    <button id="valider" type="submit" class="btn btn-primary"
                                        style="visibility: hidden">
                                        {{ __('Valider') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function toggleValidationButtonDisplay() {
            let checkbox = document.getElementById("politique");
            let boutonValider = document.getElementById("valider");
            checkbox.checked ? boutonValider.style.visibility = "visible" : boutonValider.style.visibility = "hidden"
        }
    </script>
@endsection

@extends ('layouts.app')
@section('title')
    Mon compte
@endsection
@section('content')
    <h1>Mon compte</h1>

    <h3 class="pb-3">Modifier mes informations </h3>

    <div class="row">
        <form class="col-4 mx-auto" action="{{ route('users.update', $user) }}" method="POST">
            @csrf
            @method ('PUT')

            <div class="form-group">
                <label for="name">Nouveau nom</label>
                <input required type="text" class="form-control" placeholder="modifier" name="name"
                    value="{{ $user->name }}" id="name">
            </div>

            <div class="form-group">
                <label for="first_name">Nouveau prénom</label>
                <input required type="text" class="form-control" placeholder="modifier" name="first_name"
                    value="{{ $user->first_name }}" id="first_name">
            </div>

            <div class="form-group">
                <label for="email">email</label>
                <input required type="email" class="form-control" placeholder="modifier" name="email"
                    value="{{ $user->email }}" id="email">
            </div>

            <div class="form-group">
                <label for="phone_number">Numéro de téléphone</label>
                <input required type="text" class="form-control" placeholder="modifier" name="phone_number"
                    value="{{ $user->phone_number }}" id="phone_number">
            </div>

            <button type="submit" class="btn btn-primary">Valider</button>
        </form>


        <!-- Section MODIF MOT DE PASSE
                                ============================================================ -->
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-10">


                    <!-- Card
                                            ============================================================ -->
                    <div class="card mt-4">


                        <!-- Card header "S'inscrire"
                                                ============================================================ -->
                        <div class="card-header"><small>{{ __('Modification mot de passe') }}</small></div>


                        <!-- Card body
                                                ============================================================ -->
                        <div class="card-body">


                            <!-- Formulaire modif infos
                                                    ============================================================ -->
                            <form method="POST" action="{{ route('updatepassword', $user) }}">
                                @csrf
                                @method('PUT')


                                <!-- Section nom + prenom
                                                        ============================================================ -->
                                <div class="d-flex justify-content-center gap-2">


                                    <!-- Mot de passe actuel
                                                            ============================================================ -->
                                    <div class="col mb-3">
                                        <label for="password"
                                            class="col-form-label ms-1"><small>{{ __('Mot de passe actuel') }}</small></label>

                                        <div class="col-md-12">
                                            <input id="password" type="password" placeholder="Mot de passe actuel"
                                                class="form-control @error('password') is-invalid @enderror"
                                                name="actuel_password" value="{{ old('password') }}" required
                                                autocomplete="password" autofocus>

                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>


                                    <!-- Nouveau mot de passe
                                                            ============================================================ -->
                                    <div class="col mb-3">
                                        <label for="password"
                                            class="col-form-label ms-1"><small>{{ __('Nouveau mot de passe') }}</small></label>

                                        <div class="col-md-12">
                                            <input id="password" type="password" placeholder="Nouveau mot de passe"
                                                class="form-control @error('password') is-invalid @enderror"
                                                name="nouveau_password" value="{{ old('password') }}" required
                                                autocomplete="password" autofocus>
                                            <div id="emailHelp" class="form-text ms-1">8 et 15 caracteres. minimum 1 lettre,
                                                1 chiffre et 1 caractère spécial</div>

                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>


                                    <!-- Confirmation mot de passe
                                                            ============================================================ -->
                                    <div class="col mb-3">
                                        <label for="password"
                                            class="col-form-label ms-1"><small>{{ __('Nouveau mot de passe') }}</small></label>

                                        <div class="col-md-12">
                                            <input id="password" type="password" placeholder="Nouveau mot de passe"
                                                class="form-control @error('password') is-invalid @enderror"
                                                name="nouveau_password_confirmation" value="{{ old('password') }}" required
                                                autocomplete="password" autofocus>

                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>


                                </div>

                                <!-- Boutton validation modification
                                                        ============================================================ -->
                                <div class="row mb-0 mt-2">
                                    <div class="col-md-12">
                                        <button type="submit"
                                            class="btn btn-primary col-12"><small>{{ __('Modifier le mot de passe') }}</small></button>
                                    </div>
                                </div>

                            </form>


                            <!-- Boutton supression compte
                                            ============================================================ -->
                            {{-- <div class="row mb-0 mt-2">
                                <div class="col-md-12">
                                    <form action="{{ route('user.destroy', $user) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger col-12"><small>Supprimer
                                                mon compte</small></button>
                                    </form>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

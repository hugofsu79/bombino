@extends ('layouts.app')


@section('content')
    <script>
        let userTableaux = ['modificationCompte', 'modificationMotDePasse', 'supressionCompte', 'mesCommandes']

        function showElement(elementId) {

            userTableaux.forEach(element => { // nom du tableau 
                document.getElementById(element).style.display = 'none'
            });

            let element = document.getElementById(elementId);

            // écriture ternaire
            element.style.display == "block" ? element.style.display = "none" : element.style.display = "block";

        }
    </script>


    <h1 class="text-center pt-5 mt-5 pb-5">Mon compte</h1>



    <div class="rack container align-self-center mb-5">
        <div class="arborescence row justify-content-around text-center align-self-center pb-5 pt-5">
            <div class="col">
                <button onclick="showElement('modificationCompte')">Modifier mon profil</button>
            </div>
            <div class="col">
                <button onclick="showElement('modificationMotDePasse')">Modifier mon mot de passe</button>
            </div>
            <div class="col">
                <button onclick="showElement('mesCommandes')">Mes commandes</button>
            </div>
            <div class="col">
                <button onclick="showElement('supressionCompte')">Supprimer mon compte</button>
            </div>
        </div>


        <div id="modificationCompte">
            <h2 class="title_user pb-3 text-center">Modifier mes informations </h2>

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

                <button type="submit" class="btn btn-primary mx-auto m-4">Valider</button>
            </form>
        </div>

        {{-- <!-- Section MODIF MOT DE PASSE============================================================ --> --}}
        <div id="modificationMotDePasse" class="container-fluid">
            <div class="container">
                <div class="row justify-content-center">


                    <h2 class="title_user text-center pb-2 pt-5"><small>{{ __('Modification mot de passe') }}</small></h2>

                    <div class="card-body">
                        <div class="row">
                            <div class="col">
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
                                                <div id="emailHelp" class="form-text ms-1">8 et 15 caracteres. minimum 1
                                                    lettre,
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
                                                    name="nouveau_password_confirmation" value="{{ old('password') }}"
                                                    required autocomplete="password" autofocus>

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

                                    <div class="Mon_compte_creat"> <button type="submit"
                                            class="btn btn-primary"><small>{{ __('Modifier le mot de passe') }}</small></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="mesCommandes">
            <!--BOUCLE SUR LES COMMANDES DU USER CONNECTE DANS UN TABLEAU-->
            <div class="container-fluid p-5">
                @foreach ($user->commandes as $commande)
                    <div class="row table-responsive mb-3">
                        <table class=" table table-bordered p-5">
                            <thead class="text-center">
                                <tr>
                                    <th scope="col" style="background: #151734; color:white;">Numéro</th>
                                    <th scope="col" style="background: #151734; color:white;">Prix</th>
                                    <th scope="col" style="background: #151734; color:white;">Date</th>
                                    <th scope="col" style="background: #151734; color:white;">Créneau choisi</th>
                                    <th scope="col" style="background: #151734; color:white;">Détails</th>
                                </tr>
                            </thead>
                            <tr class="text-center my-auto">
                                <th scope="row">{{ $commande->id }}</th>
                                <td>{{ $commande->price }} €</td>
                                <td>{{ date('d/m/y', strtotime($commande->created_at)) }}</td>
                                <td>{{ $commande->hour }}</td>
                                <td>
                                    <!--BOUTON DU DETAIL DE LA COMMANDE-->
                                    <a class="link-offset-2 link-underline link-underline-opacity-0 text-dark"
                                        href="{{ route('commandes.show', $commande) }}">
                                        Détail
                                    </a><i class="fa-solid fa-magnifying-glass"></i>
                                </td>
                            </tr>
                        </table>
                    </div>
                @endforeach
            </div>
        </div>


        <!-- Boutton supression compte
                                                                                                                                                                                                                                            ============================================================ -->

        <div id="supressionCompte">
            <h2 class="title_user pb-3 text-center">Supprimer mon compte </h2>

            <!-- Button trigger modal -->

            <!-- Bouton suppression compte
                                                                ============================================================ -->
            <form action="{{ route('users.destroy', $user) }}" method="post">
                @csrf
                @method('delete')
                <button type="submit"
                    class="supprimer_compte col-md-12 btn btn-danger mx-auto text-center">Supprimer</button>
            </form>

        </div>
    </div>
@endsection

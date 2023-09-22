@extends('layouts.app')
@section('content')
    <main class="pt-5">
        <h1 class="h1_panier text-center">Réservation</h1> {{-- formulaire booking.store  --}}
        <div class="container">
            <form method="POST" action="{{ route('login') }}">
                @csrf

                @if (Route::has('login'))
                    <h2 class="title_reservation text-center mb-5">Envoyez votre demande de reservation</h2>

                    <!-- Section nom + prenom
                                                                                                                            ============================================================ -->
                    <div class="formulaire d-flex justify-content-center">
                        <div class="row row-cols">
                            <h2 class="title_reservation">Identifiant</h3>
                            <div class="col-md-12">
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col">
                                        <div class="identifiant_profil row">
                                            <div class="col">
                                                <div>
                                                    <h3>{{ Auth::user()->first_name }}</h3>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div>
                                                    <h3>{{ Auth::user()->name }}</h3>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="row pt-3">
                                                <div class="col">
                                                    <div>
                                                        <h3>{{ Auth::user()->phone_number }}</h3>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <h2 class="title_reservation mt-5">Quand est ce que vous comptez venir ?</h3>
                                                        <div class="col">
                                                            <div>
                                                                <h3>Date</h3>
                                                                <input type="date" min="{{date('Y-m-d')}}" class="form-control" id="date"
                                                                    aria-describedby="date">
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <h3>Heure</h3> <input type="time" min="12:00" max="22:30" class="form-control"
                                                                id="hour" aria-describedby="hourHelp">
                                                        </div>
                                                        <div class="col">
                                                            <h3>Nombre de persone</h3> <input type="number" min="1" max="8" class="form-control"
                                                                id="hour" aria-describedby="numberHelp">
                                                        </div>
                                                </div>
                                            </div>     
                                        </div>

                                        <!-- Boutton Reservation
                                                                                                                            ============================================================ -->
                                        <div class="col-md-12 mt-5">
                                            <div class="col-md-12">
                                                <button type="submit" class="btn btn-danger col-12"><small
                                                        class="text-light">{{ __('Réserver') }}</small></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </form>
        </div>
    </main>
    @endif
@endsection

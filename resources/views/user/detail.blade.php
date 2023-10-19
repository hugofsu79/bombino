@extends('layouts.app')

@section('content')
    <!--TITRE DE PAGE : NUMERO DE LA COMMANDE-->
    <h1 class="text-center p-0 "><span class="px-5 border border-secondary rounded">Détail de la commande </span> </h1>
    <p class="text-center pt-5 fs-1">n° {{ $commande->id }} </p>
    <!--MONTANT-->
    <p class="text-center pt-5 fs-3">Montant : <strong>{{ $commande->price }} €</strong></p>


    <!--DATES DE COMMANDE-->
    <p class="text-center pt-3 fs-3">Date : <strong>
            {{ date('d/m/y', strtotime($commande->created_at)) }} à
            {{ date('H', strtotime($commande->created_at)) }}h{{ date('i', strtotime($commande->created_at)) }}</strong></p>


    <!--CONDITIONS D AFFICHAGE EN FONCTION DE L EXISTENCE DE REDUCTIONS-->
    <div class="container">
        <table class="table table-bordered table-hover bg-white">
            <thead class="text-center">
                <tr>
                    <th style="background-color: #3F3028;color: white">Article</th>
                    <th style="background-color: #3F3028;color: white" scope="col">Prix unitaire</th>
                    <th style="background-color: #3F3028;color: white" scope="col">Description</th>
                    <th style="background-color: #3F3028;color: white" scope="col">Quantité</th>
                    <th style="background-color: #3F3028;color: white" scope="col">Prix</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($commande->articles as $article)
                    <tr class="text-center">
                        <td>{{ $article->name }}</td>
                        <td>{{ $article->price }} €</td>
                        <td>{{ $article->ingredients }}</td>
                        <td>{{ $article->pivot->quantity }}</td>
                        <td>{{ number_format($article->price * $article['quantity'], 2, ',', ' ') }}€</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <a class="navbar-brand" type="button"href="{{ route('home') }}">
            <img class="logo m-2" width="23%" src="{{ asset('svg/bombino_v2-06.svg') }}"
                alt="home_button">
        </a>
    </div>
@endsection

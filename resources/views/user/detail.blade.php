@extends('layouts.app')

@section('content')
    <!--TITRE DE PAGE : NUMERO DE LA COMMANDE-->
    <h1 class="text-center p-0 "><span class="px-5 border border-secondary rounded">Détail de la commande </span> </h1>
    <div>
        
        <div class="panier_detail">
            <p class="pt-5 fs-1">n° {{ $commande->id }} </p>
            <svg class="m-2" width="9%" id="Calque_1" data-name="Calque 1" xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 73.77 77.33">
                <defs>
                    <style>
                        .cls-1 {
                            fill: #151734;
                            stroke-width: 0px;
                        }
                    </style>
                </defs>
                <path class="cls-1"
                    d="m73.76,49.26c0-.06,0-.11-.02-.17,0-.01,0-.03,0-.04,0,0,0,0,0,0,0-.03-.03-.06-.04-.09s-.02-.07-.03-.1l-7.52-16.64-4.91-10.51s-.01-.01-.02-.02c0-.01,0-.03-.01-.04l-.08-.16c-.11-.23-.28-.42-.51-.54L24.77.16c-.42-.24-.95-.21-1.34.08l-5.74,4.3c-.32.24-.51.63-.49,1.04,0,.17.06.34.14.49h0s11.67,22.96,11.67,22.96c.19.38.57.63.99.66l2.34.18L.79,48.15s-.01,0-.02,0l-.18.11c-.37.22-.59.62-.59,1.05v5.76c0,.43.23.83.6,1.05l36.02,20.89s.03.03.05.04l.22.12c.18.1.39.15.59.15s.42-.05.61-.16l32.77-19.02,2.22-1.28s.12-.08.14-.09c.34-.23.54-.61.54-1.01v-6.41s-.01-.06-.01-.1Zm-21.76-22.68s.07.04.1.05l1.35.78,7.28,13.89-23.47-13.22-7-14.12,21.74,12.61Zm16.18,23.91l-.71.41-.52.3-29.41-16.93v-3.22l25.26,14.22,2.37,4.52c.21.39.61.64,1.05.65l1.95.04Zm-33.07-16.22L6.59,50.8l-2.75-1.6,31.28-18.13v3.19Zm-12.95,25.57c-.37-.21-.81-.21-1.19-.02-.19.1-.34.24-.45.42-.11.17-.18.37-.19.59,0,.14-.02.24-.04.32-.46-.3-1.23-1.27-1.44-2.7-.05-.37-.27-.69-.59-.88l-9.24-5.36,25.65-14.88,1.66-.95,24.18,13.9,4.01,2.32-24.74,14.35-2.62,1.52-4.15-2.39-10.84-6.25Zm48.48-11.74l-3.65-.08-11.08-21.13,3-2.25.73-.55,4.27,9.14,6.72,14.87ZM24.24,2.68l33.77,19.59-3.74,2.81-1.04-.61s-.07-.04-.1-.05l-25.14-14.59s-.06-.03-.09-.05l-7.29-4.37,3.64-2.73Zm-2.82,6.06l5.02,3.01,7.84,15.83-3.42-.27-9.44-18.57ZM2.44,51.22l3.53,2.05s0,0,0,0h0s10.58,6.13,10.58,6.13c.28,1.22.86,2.3,1.59,3.07.02.02.04.04.06.06.16.16.32.32.49.45.06.05.13.08.19.13.13.09.26.18.4.25.08.04.15.06.23.09.13.05.26.11.39.14.07.02.13.02.2.03.13.02.25.05.38.05.03,0,.06,0,.09,0,.45-.02.93-.19,1.32-.55.13-.12.25-.26.36-.42l13.8,7.94v3.22L2.44,54.38v-3.15Zm68.9,3.84l-32.84,19.05v-3.61l32.84-19.04v3.6Z" />
            </svg>
        </div>
        <!--MONTANT-->
        <p class="text-center pt-5 fs-3">Montant : <strong>{{ $commande->price }} €</strong></p>


        <!--DATES DE COMMANDE-->
        <p class="text-center pt-3 fs-3">Date : <strong>
                {{ date('d/m/y', strtotime($commande->created_at)) }} à
                {{ date('H', strtotime($commande->created_at)) }}h{{ date('i', strtotime($commande->created_at)) }}</strong>
        </p>


        <!--CONDITIONS D AFFICHAGE EN FONCTION DE L EXISTENCE DE REDUCTIONS-->
        <div class="container">
            <table class="table_detail table table-bordered table-hover bg-white">
                <thead class="text-center">
                    <tr>
                        <th style="background-color: #151734;color: white">Article</th>
                        <th style="background-color: #151734;color: white" scope="col">Prix unitaire</th>
                        <th style="background-color: #151734;color: white" scope="col">Description</th>
                        <th style="background-color: #151734;color: white" scope="col">Quantité</th>
                        <th style="background-color: #151734;color: white" scope="col">Prix</th>
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

        </div>
    @endsection

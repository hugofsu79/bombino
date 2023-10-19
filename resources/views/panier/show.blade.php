@extends('layouts.app')

@section('content')
    <h1 class="h1_panier text-center">Mon panier</h1>

    <div class="panier-header container">

        @if (session()->has('message'))
            <div class="alert alert-info">{{ session('message') }}</div>
        @endif

        @if (session()->has('panier'))
            <div class="table-responsive mb-3">
                <table class="table table-striped table-dark mb-0">
                    <thead class="thead-dark">
                        <tr class="text-center">
                            <th style="background-color: #89807c;color: white"></th>
                            <th style="background-color: #9f968e;color: white">Produit</th>
                            <th style="background-color: #89807c;color: white">Prix</th>
                            <th style="background-color: #9f968e;color: white">Quantité</th>
                            <th style="background-color: #89807c;color: white">Total</th>
                            <th style="background-color: #9f968e;color: white">Opérations</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Initialisation du total général à 0 -->
                        @php $total = 0 @endphp

                        <!-- On parcourt les produits du panier en session : session('panier') -->
                        @foreach (session('panier') as $position => $article)
                            <tr class="text-center">
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    {{ $article['name'] }}
                                </td>

                                <!--  PRIX = si la clé campagne existe pour cet article, j'affiche le nom de la promo + % réduction + prix barré + prix promo -->


                                <td>{{ $article['price'] }} €</td>

                                <td>
                                    <!-- Le formulaire de mise à jour de la quantité -->
                                    <form method="POST" action="{{ route('panier.add', $position) }}"
                                        class="form-inline d-inline-block">
                                        {{ csrf_field() }}
                                        <input type="number" name="quantity" placeholder="Quantité ?"
                                            value="{{ $article['quantity'] }}" class="form-control pl-3"
                                            style="width: 80px">
                                        <input type="submit" class="btn text-light m-1 text-center" value="Actualiser" />
                                    </form>
                                </td>

                                <td>
                                    {{ number_format($article['price'] * $article['quantity'], 2, ',', ' ') }}€
                                </td>

                                <td>
                                    <!-- Le lien pour retirer un produit du panier -->
                                    <a href="{{ route('panier.remove', $position) }}" class="btn btn-outline-danger "
                                        title="Retirer le produit du panier">Retirer</a>
                                </td>
                            </tr>

                            <!-- On incrémente le total général par le total de chaque produit du panier -->
                            @php $total += $article['price'] * $article['quantity'] @endphp
                        @endforeach
                        <tr colspan="2">
                            <td colspan="4">Total général</td>
                            <td colspan="2">
                                <!-- On affiche total général -->
                                <strong>{{ number_format($total, 2, ',', ' ') }} €</strong>

                            </td>
                        </tr>
                    </tbody>

                </table>
            </div>


            <!-- ==================================================== Boutons VALIDER/VIDER ============================================== -->

            <div class="d-flex justify-content-center pb-5">

                <!-- Lien pour vider le panier -->
                <a class="btn btn-danger mx-3" href="{{ route('panier.empty') }}"
                    title="Retirer tous les produits du panier">Vider
                    le panier</a>
        @if (Auth::user())
                    <a class="btn btn-success mx-3" href="{{ route('panier.validation') }}"
                        title="Valider le panier">Valider</a>
        @endif
        @else
                <h1 class="h1_panier mx-auto text-center">Aucun produit au panier</h1>
            </div>
        @endif
    </div>
@endsection
 
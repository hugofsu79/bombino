<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\User;
use App\Models\Commande;
use Illuminate\Support\Facades\Gate;

class PanierController extends Controller
{

	// ======================== Affichage du panier ========================= //

	public function show()
	{
		
		return view("panier.show"); // resources\views\panier\show.blade.php
	}



	// ======================== Ajout d'un produit au panier ================ //

	public function add(Article $article, Request $request)
	{
		// Validation de la requête
		$this->validate($request, [
			"quantity" => "numeric|min:1"
		]);

		$panier = session()->get("panier"); // On récupère le panier en session

		// Les informations du produit à ajouter
		$article_details = [
			'id' => $article->id,
			'name' => $article->name,
			'price' => $article->price,
			'quantity' => $request->quantity
		];

		$panier[$article->id] = $article_details; // On ajoute ou on met à jour le produit au panier
		session()->put("panier", $panier); // On enregistre le panier

		// Redirection vers le panier avec un message
		return back()->withMessage("Produit ajouté au panier");
	}


	// ============================ Suppression d'un produit du panier ========================= //

	public function remove(Article $article)
	{
		$panier = session()->get("panier"); // On récupère le panier en session
		unset($panier[$article->id]); // On supprime le produit du tableau $panier
		session()->put("panier", $panier); // On enregistre le panier

		// Redirection vers le panier
		return back()->withMessage("Produit retiré du panier");
	}


	// ===================================== Vider le panier ================================== //

	public function empty()
	{
		session()->forget("panier"); // On supprime le panier en session

		// Redirection vers le panier
		return back()->withMessage("Panier vidé");
	}


	// ================================ Validation d'une commande ============================= //

	public function validation(Request $request)
	{

		$user = User::find(auth()->user()->id);


		// si je viens de choisir un moment pour récuperer la pizza
			// session(['commande' => $hour]);
			// autre syntaxe : session()->put('adresseLivraison' => $adresseLivraison);

		// si je viens de choisir une adresse de facturation => même principe 
		if (($request->adresseFacturationId)) {
			$adresseFacturationId = $request->input('adresseFacturationId');
			$adresseFacturation = Commande::findOrFail($adresseFacturationId);
			session(['adresseFacturation' => $adresseFacturation]);
		}

		return view("panier/validation", ['user' => $user]);
	}


	// ======================= Vider le panier après la validation d'une commande ================== //

	public function emptyAfterOrder() //viderAprèsCommande
	{
		session()->forget('panier'); // On supprime le panier en session

		// Redirection vers la page "home"
		return redirect()->route('home')->withMessage('success', 'Votre commande a été validée.');
	}


}

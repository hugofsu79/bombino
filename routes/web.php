<?php

use App\Http\Controllers\BookingController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\GammeController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\PolitiqueController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| /* 1) Home
| /* 2) User
| /* 3) Backoffice
| /* 4) Booking
| /* 5) Articles -> article/Gamme
| /* 6) panier
| /* 7) Commande
| /* 8) RGPD
| /* 9) 404

*/

// 1) Route  "Home"
Route::get('/', function () {
    return view('welcome');
});
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// 2) Route  "USER"
Route::resource('/user', App\Http\Controllers\UserController::class)->except('index', 'create', 'store');
Route::put('/user/updatepassword/{user}', [App\Http\Controllers\UserController::class, 'updatePassword'])->name('updatepassword');
Route::resource('users', UserController::class)->except('index', 'create', 'store');
Route::get('account/{user}', [UserController::class, 'account'])->name('account');
Route::put('account/update',  [App\Http\Controllers\UserController::class, 'update'])->name('account.update');
Route::put('account/updatePassword',  [App\Http\Controllers\UserController::class, 'updatePassword'])->name('account.updatePassword');
Route::delete('user/delete',  [App\Http\Controllers\UserController::class, 'delete'])->name('user.delete');
Route::resource('/user', App\Http\Controllers\UserController::class)->except('index', 'create', 'store');
//valider les modifications d'informations personnelles
// Modification mot de passe
Route::put('/user/updatepassword/{user}', [App\Http\Controllers\UserController::class, 'updatePassword'])->name('updatepassword');


// 3) Route  "Backoffice"
Route::get('/admin', [AdminController::class, 'index'])->name('admin')->middleware('admin');


// 4) Route  booking
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('booking');
Route::get('booking', [App\Http\Controllers\BookingController::class, 'create'])->name('booking.create');
// ******************* Les routes ressources Booking->reservation  **************** //
Route::resource('/booking', BookingController::class);


// 5) Route  Articles
// ******************* Les routes ressources Article **************** //
Route::resource('/articles', ArticleController::class);
// ******************* Les routes ressources Gammes **************** //
Route::resource('/gammes', GammeController::class);
// **************** Les routes de gestion du panier **************** //
Route::resource('/articles', ArticleController::class);
// ******************* Les routes ressources Articles **************** //


// 6) Panier
Route::get('panier', [App\Http\Controllers\PanierController::class, 'show'])->name('panier.show');
// « panier.show » pour afficher le panier
Route::post('panier/add/{article}', [App\Http\Controllers\PanierController::class, 'add'])->name('panier.add');
// « panier.add » pour ajouter ou mettre à jour un produit du panier
Route::get('panier/remove/{article}', [App\Http\Controllers\PanierController::class, 'remove'])->name('panier.remove');
//« panier.remove » pour retirer un produit du panier
Route::get('panier/empty', [App\Http\Controllers\PanierController::class, 'empty'])->name('panier.empty');
//« panier.empty » pour vider les produits du panier
Route::post('validation/choixcreneau', [App\Http\Controllers\CommandeController::class, 'choixCreneau'])->name('choixCreneau');
// 'validation_creneau' pour afficher le formulaire frais de port
Route::get('panier/validation', [App\Http\Controllers\PanierController::class, 'validation'])->name('panier.validation')->middleware('auth');
// 'validation' pour afficher la page validation
Route::get('/emptyAfterOrder', [App\Http\Controllers\PanierController::class, 'emptyAfterOrder'])->name('emptyAfterOrder');
// pour vider le panier après validation de la commande
Route::get('/recuperer-commande', 'PanierController@recupererCommande');
// Récupération de la commande


// 7) Commandes
Route::resource('/commandes', App\Http\Controllers\CommandeController::class)->except('create', 'store', 'edit', 'update', 'destroy');
Route::get('/sauvegardeCommande', [App\Http\Controllers\CommandeController::class, 'store'])->name('commandes.store');
// 'store' pour sauvegarder la commande en BDD après validation de la commande


// 8) RGPD
Route::get('/politique', [App\Http\Controllers\HomeController::class, 'politique'])->name('politique');


// 9) 404
Route::fallback(function () {
    return view('404'); // la vue 404.blade.php
});

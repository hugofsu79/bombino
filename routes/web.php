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
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// Route  "USER"
Route::resource('/user', App\Http\Controllers\UserController::class)->except('index', 'create', 'store');
Route::put('/user/updatepassword/{user}', [App\Http\Controllers\UserController::class, 'updatePassword'])->name('updatepassword');


// Route controller User -> à elle seule, elle crée les 7 routes du mode ressource
Route::resource('users', UserController::class)->except('index', 'create', 'store');



// Modification mot de passe
Route::put('/user/updatepassword/{user}', [App\Http\Controllers\UserController::class, 'updatePassword'])->name('updatepassword');



//*******************Route pour la gestion du back-office************************************/
Route::get('/admin', [AdminController::class, 'index'])->name('admin')->middleware('admin');

// Route  booking
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('booking');

Route::get('booking', [App\Http\Controllers\BookingController::class, 'create'])->name('booking.createe');




// ******************* Les routes ressources Articles **************** //
Route::resource('/articles', ArticleController::class);



// ******************* Les routes ressources Gammes **************** //
Route::resource('/gammes', GammeController::class);

// **************** Les routes de gestion du panier **************** //

Route::get('panier', [App\Http\Controllers\PanierController::class, 'show'])->name('panier.show');
// « panier.show » pour afficher le panier

Route::post('panier/add/{article}', [App\Http\Controllers\PanierController::class, 'add'])->name('panier.add');
// « panier.add » pour ajouter ou mettre à jour un produit du panier

Route::get('panier/remove/{article}', [App\Http\Controllers\PanierController::class, 'remove'])->name('panier.remove');
//« panier.remove » pour retirer un produit du panier

Route::get('panier/empty', [App\Http\Controllers\PanierController::class, 'empty'])->name('panier.empty');
//« panier.empty » pour vider les produits du panier



// *************** Les routes de la page Validation Panier *********** //

Route::get('panier/validation', [App\Http\Controllers\PanierController::class, 'validation'])->name('panier.validation')->middleware('auth');
// 'validation' pour afficher la page validation



// ********** User ***********

Route::get('account/{user}', [UserController::class, 'account'])->name('account');
Route::put('account/update',  [App\Http\Controllers\UserController::class, 'update'])->name('account.update');
Route::put('account/updatePassword',  [App\Http\Controllers\UserController::class, 'updatePassword'])->name('account.updatePassword');
Route::delete('user/delete',  [App\Http\Controllers\UserController::class, 'delete'])->name('user.delete');
Route::resource('/user', App\Http\Controllers\UserController::class)->except('index', 'create', 'store');
//valider les modifications d'informations personnelles


Route::post('cart/validation', [App\Http\Controllers\PanierController::class, 'validation'])->name('cart.validation');
// valider choix d'adresse de livraison ou de facturation

Route::get('/emptyAfterOrder', [App\Http\Controllers\PanierController::class, 'emptyAfterOrder'])->name('emptyAfterOrder');
// pour vider le panier après validation de la commande


// Récupération de la commande
Route::get('/recuperer-commande', 'PanierController@recupererCommande');

// ******************* Les routes de la page Commandes **************** //

Route::resource('/commandes', App\Http\Controllers\CommandeController::class)->except('create', 'store', 'edit', 'update', 'destroy');

Route::get('/sauvegardeCommande', [App\Http\Controllers\CommandeController::class, 'store'])->name('commandes.store');
// 'store' pour sauvegarder la commande en BDD après validation de la commande



// ******************* Les routes ressources Booking->reservation  **************** //
Route::resource('/booking', BookingController::class);


// ******************* Les routes RGPD  **************** //

Route::get('/politique', [App\Http\Controllers\HomeController::class, 'politique'])->name('politique');


// ******************* Les routes ressources Articles **************** //
Route::resource('/articles', ArticleController::class);

// Route highlighted  --> GET
Route::get('/highlighted', [App\Http\Controllers\HighlightedController::class, 'highlighted'])->name('highlighted');









Route::fallback(function () {
    return view('404'); // la vue 404.blade.php
});

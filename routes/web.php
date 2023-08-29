<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\GammeController;
use App\Http\Controllers\ArticleController;

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
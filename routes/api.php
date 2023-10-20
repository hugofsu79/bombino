<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| 1. `Route::middleware('auth:sanctum')` : Cette partie définit un middleware Sanctum
| qui vérifie l'authentification par jeton.
| 2. `->get('/user', function (Request $request) { ... })` : 
| Cette ligne configure la route pour répondre uniquement aux requêtes GET à l'endpoint /user.
| 3. `return $request->user();` :
| Cela renvoie les informations de l'utilisateur actuellement authentifié.
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

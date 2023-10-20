<?php

use Illuminate\Support\Facades\Broadcast;

/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Cette ligne de code dans Channels.php
| authentifie les utilisateurs en fonction de leur identifiant pour contrôler
| l'accès aux données du modèle User via les canaux de diffusion de Laravel,
| évitant ainsi un accès non restreint à ces informations.
|
*/

Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});

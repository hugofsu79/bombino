<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        // je définis mon Gate en lui donnant un nom et en précisant les conditions
        // la fonction prend en paramètre le user connecté
        // 1er gate : vérifie que le user est admin pour accéder au back-office
        Gate::define('access_backoffice', function ($user) {

            return $user->isAdmin(); //condition à satisfaire pour passer le gate
            // autre syntaxe
            // if ($user->isAdmin()) {
            //     return true;
            // } else {
            //     return false;
            // }
        });
    }
}

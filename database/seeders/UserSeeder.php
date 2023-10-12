<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     *@return void
     */
    public function run(): void
    {
        //création de l'administrateur
        User::create([
            'name' => 'administrateur',
            'first_name' => 'admin',
            'password' => Hash::make('Azerty88@'),
            'email' => 'admin@bombino.fr',
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
            'role_id' => 2,
            'phone_number' => '0686137672'
        ]);

        //création d'un utilisateur de test
        User::create([
            'name' => 'Dupuy',
            'first_name' => 'Henri',
            'password' => Hash::make('Azerty88@'),
            'email' => 'utilisateur@bombino.fr',
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
            'role_id' => 1,
            'phone_number' => '0686137272'
        ]);

        //création de 8 users aléatoires
        User::factory(12)->create();
    }
}

<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Adresse;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Commande>
 */
class CommandeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [

            'price' => $this->faker->randomFloat(2, 10, 350),
            'user_id' => rand(1, User::count()),
            'hour' => $this->faker->dateTimeBetween('-1 week', '+2 week')
        ];
    }
}

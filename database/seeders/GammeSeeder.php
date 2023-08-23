<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Gamme;

class GammeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Gamme::create([
            'nom' => 'Base crème de parmesan'
        ]);
        Gamme::create([
            'nom' => 'Base tomate'
        ]);
        Gamme::create([
            'nom' => 'Panuozzo'
        ]);
        Gamme::create([
            'nom' => 'Antipasti'
        ]);
        Gamme::create([
            'nom' => 'Dolce'
        ]);
        Gamme::create([
            'nom' => 'Soft'
        ]);
        Gamme::create([
            'nom' => 'Vino & birra'
        ]);
    }
}

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
            'name' => 'Base crème de parmesan'
        ]);
        Gamme::create([
            'name' => 'Base tomate'
        ]);
        Gamme::create([
            'name' => 'Panuozzo'
        ]);
        Gamme::create([
            'name' => 'Antipasti'
        ]);
        Gamme::create([
            'name' => 'Dolce'
        ]);
        Gamme::create([
            'name' => 'Soft'
        ]);
        Gamme::create([
            'name' => 'Vino & birra'
        ]);
    }
}

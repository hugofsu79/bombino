<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Role;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RoleSeeder::class,
            UserSeeder::class,
            BookingSeeder::class,
            GammeSeeder::class,
            ArticleSeeder::class,
            CommandeSeeder::class,
            CommandeArticleSeeder::class
        ]);
    }
}

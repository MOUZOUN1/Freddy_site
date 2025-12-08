<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LanguesSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('langues')->insert([
            ['nomlangue' => 'Français', 'codelangue' => 'fr', 'description' => 'Langue française officielle.', 'created_at' => now(), 'updated_at' => now()],
            ['nomlangue' => 'Anglais', 'codelangue' => 'en', 'description' => 'Langue anglaise internationale.', 'created_at' => now(), 'updated_at' => now()],
            ['nomlangue' => 'Fon', 'codelangue' => 'fon', 'description' => 'Langue locale du Bénin.', 'created_at' => now(), 'updated_at' => now()],
            ['nomlangue' => 'Yoruba', 'codelangue' => 'yo', 'description' => 'Langue africaine parlée au Nigeria et Bénin.', 'created_at' => now(), 'updated_at' => now()],
            ['nomlangue' => 'Espagnol', 'codelangue' => 'es', 'description' => 'Langue espagnole parlée dans plusieurs pays.', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}

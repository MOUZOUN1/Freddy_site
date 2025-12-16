<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            // Ajout de tous les seeders listés dans l'image
           
            RolesSeeder::class,
         
              LanguesSeeder::class,
              RegionsSeeder::class,
               TypeContenusSeeder::class,
            TypeMediaSeeder::class,
             UserSeeder::class,
              
            ContenusSeeder::class,
            CommentairesSeeder::class,
            MediaSeeder::class,
          
            
           
            ParlersSeeder::class,
        ]);
    }
}

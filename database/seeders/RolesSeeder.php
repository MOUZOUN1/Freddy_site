<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Administrateur
        Role::updateOrCreate(
            ['slug' => 'administrateur'],
            ['name' => 'Administrateur', 'permissions' => json_encode(['*'])]
        );

        // Manager
        Role::updateOrCreate(
            ['slug' => 'manager'],
            ['name' => 'Manager', 'permissions' => json_encode([])]
        );

        // Modérateur
        Role::updateOrCreate(
            ['slug' => 'moderateur'],
            ['name' => 'Modérateur', 'permissions' => json_encode([
                'platform.posts.create',
                'platform.posts.edit'
            ])]
        );

        // Auteur
        Role::updateOrCreate(
            ['slug' => 'auteur'],
            ['name' => 'Auteur', 'permissions' => json_encode([
                'platform.posts.create',
                'platform.posts.edit'
            ])]
        );

        // Lecteur
        Role::updateOrCreate(
            ['slug' => 'lecteur'],
            ['name' => 'Lecteur', 'permissions' => json_encode([])]
        );
    }
}

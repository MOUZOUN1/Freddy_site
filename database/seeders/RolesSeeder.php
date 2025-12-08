<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('roles')->insert([
    ['slug' => 'administrateur', 'name' => 'Administrateur', 'permissions' => json_encode(['*'])],

    ['slug' => 'manager', 'name' => 'Manager', 'permissions' => json_encode([])],
    ['slug' => 'moderateur', 'name' => 'Modérateur', 'permissions' => json_encode(['platform.posts.create', 'platform.posts.edit'])],
    ['slug' => 'auteur', 'name' => 'Auteur', 'permissions' => json_encode(['platform.posts.create', 'platform.posts.edit'])],
    ['slug' => 'lecteur', 'name' => 'Lecteur', 'permissions' => json_encode([])],
]);

    }
}

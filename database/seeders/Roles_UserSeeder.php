<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class Roles_UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('role_users')->insert([
    ['user_id' => 1, 'role_id' => 1], // Exemple : assigner l’utilisateur 1 au rôle Administrateur
]);
    }
}

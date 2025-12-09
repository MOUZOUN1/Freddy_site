<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Roles_UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userId = 3; // l’utilisateur cible
        $roleId = 1; // rôle Administrateur

        // Vérifie si la relation existe déjà
        $exists = DB::table('role_users')
            ->where('user_id', $userId)
            ->where('role_id', $roleId)
            ->exists();

        if (!$exists) {
            DB::table('role_users')->insert([
                'user_id' => $userId,
                'role_id' => $roleId,
            ]);
        }
    }
}

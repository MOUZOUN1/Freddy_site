<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Role;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Créer ou récupérer le rôle "administrateur"
        $role = Role::firstOrCreate(
            ['slug' => 'administrateur'],
            ['name' => 'Administrateur', 'permissions' => json_encode(['*'])]
        );

        // ---- 1er utilisateur admin existant ----
        $user1 = User::firstOrCreate(
            ['email' => 'freddymouzoun@gmai.com'],
            [
                'name' => 'Freddy',
                'password' => Hash::make('Freddymzn27@@'),
                'permissions' => json_encode([
                    'platform.index' => true,
                    'platform.systems.roles' => true,
                    'platform.systems.users' => true,
                    'platform.systems.attachment' => true,
                ]),
            ]
        );
        $user1->roles()->syncWithoutDetaching([$role->id]);

        // ---- 2e utilisateur à ajouter (Maurice) ----
        $user2 = User::firstOrCreate(
            ['email' => 'maurice.comlan@uac.bj'],
            [
                'name' => 'Maurice',
                'password' => Hash::make('Eneam123'),
                'permissions' => json_encode([
                    'platform.index' => true,
                ]),
            ]
        );
        $user2->roles()->syncWithoutDetaching([$role->id]);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Admin par défaut
        User::updateOrCreate(
            ['email' => 'freddymouzoun@gmail.com'],
            [
                'name' => 'Freddy',
                'password' => Hash::make('Freddymzn27@@'),
                'is_admin' => true,
                'is_subscribed' => true,
                'email_verified_at' => now(),
                'role_id' => 1,
                'email_verified' => true,
                'verification_token' => null,
            ]
        );

        // Utilisateur simple
        User::updateOrCreate(
            ['email' => 'maurice.comlan@uac.bj'],
            [
                'name' => 'Maurice',
                'password' => Hash::make('Eneam123'),
                'is_admin' => true,
                'is_subscribed' => true,
                'email_verified_at' => now(),
                'role_id' => 1, // rôle utilisateur simple
                'email_verified' => true,
                'verification_token' => null,
            ]
        );

        // Générer 10 utilisateurs aléatoires via factory
       
    }
}

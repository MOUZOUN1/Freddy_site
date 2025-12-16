<?php
use Illuminate\Database\Seeder;
use App\Models\Role;

class RolesSeeder extends Seeder
{
    public function run(): void
    {
        Role::firstOrCreate(['slug' => 'admin'], ['name' => 'Administrateur']);
        Role::firstOrCreate(['slug' => 'editor'], ['name' => 'Éditeur']);
        Role::firstOrCreate(['slug' => 'user'], ['name' => 'Utilisateur']);
    }
}


<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('role')->insert([
            ['libelle'=>'Administrateur','created_at'=>now(),'updated_at'=>now()],
            ['libelle'=>'Manager','created_at'=>now(),'updated_at'=>now()],
            ['libelle'=>'Modérateur','created_at'=>now(),'updated_at'=>now()],
            ['libelle'=>'Auteur','created_at'=>now(),'updated_at'=>now()],
            ['libelle'=>'Lecteur','created_at'=>now(),'updated_at'=>now()],
        ]);
    }
}

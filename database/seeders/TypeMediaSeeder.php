<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypemediaSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('typemedia')->insert([
            ['libelle'=>'Image','created_at'=>now(),'updated_at'=>now()],
            ['libelle'=>'Vidéo','created_at'=>now(),'updated_at'=>now()],
            ['libelle'=>'Audio','created_at'=>now(),'updated_at'=>now()],
            ['libelle'=>'Document PDF','created_at'=>now(),'updated_at'=>now()],
            ['libelle'=>'Infographie','created_at'=>now(),'updated_at'=>now()],
        ]);
    }
}

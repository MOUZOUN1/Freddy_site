<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypecontenusSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('typecontenus')->insert([
            ['libelle'=>'Article','created_at'=>now(),'updated_at'=>now()],
            ['libelle'=>'Vidéo','created_at'=>now(),'updated_at'=>now()],
            ['libelle'=>'Podcast','created_at'=>now(),'updated_at'=>now()],
            ['libelle'=>'Image','created_at'=>now(),'updated_at'=>now()],
            ['libelle'=>'Document PDF','created_at'=>now(),'updated_at'=>now()],
        ]);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MediaSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('media')->insert([
            ['description'=>'Image de la plage','typemedia_id'=>1,'contenu_id'=>1,'created_at'=>now(),'updated_at'=>now()],
            ['description'=>'Vidéo documentaire','typemedia_id'=>2,'contenu_id'=>2,'created_at'=>now(),'updated_at'=>now()],
            ['description'=>'Audio podcast','typemedia_id'=>3,'contenu_id'=>3,'created_at'=>now(),'updated_at'=>now()],
            ['description'=>'PDF guide touristique','typemedia_id'=>4,'contenu_id'=>5,'created_at'=>now(),'updated_at'=>now()],
            ['description'=>'Infographie historique','typemedia_id'=>5,'contenu_id'=>4,'created_at'=>now(),'updated_at'=>now()],
        ]);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RegionsSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('regions')->insert([
            ['nom'=>'Atlantique','description'=>'Région côtière avec une forte activité économique.','localisation'=>'Sud','superficie'=>3233,'population'=>1500000,'created_at'=>now(),'updated_at'=>now()],
            ['nom'=>'Borgou','description'=>'Grande région agricole située dans le nord-est.','localisation'=>'Nord-Est','superficie'=>25956,'population'=>1200000,'created_at'=>now(),'updated_at'=>now()],
            ['nom'=>'Zou','description'=>'Région culturelle et historique au centre du pays.','localisation'=>'Centre','superficie'=>5264,'population'=>900000,'created_at'=>now(),'updated_at'=>now()],
            ['nom'=>'Mono','description'=>'Petite région côtière située au sud-ouest.','localisation'=>'Sud-Ouest','superficie'=>1605,'population'=>500000,'created_at'=>now(),'updated_at'=>now()],
            ['nom'=>'Alibori','description'=>'Plus grande région du pays, essentiellement agricole.','localisation'=>'Nord','superficie'=>26242,'population'=>800000,'created_at'=>now(),'updated_at'=>now()],
        ]);
    }
}

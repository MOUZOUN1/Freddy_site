<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContenusSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('contenus')->insert([
            ['titre'=>'Découverte du Bénin','texte'=>'Un article sur la culture béninoise.','statut'=>'Publié','typecontenu_id'=>1,'region_id'=>1,'langue_id'=>1,'user_id'=>1,'contenu_id'=>null,'created_at'=>now(),'updated_at'=>now()],
            ['titre'=>'Vidéo sur le Nil','texte'=>'Documentaire sur le fleuve Nil.','statut'=>'Brouillon','typecontenu_id'=>2,'region_id'=>2,'langue_id'=>2,'user_id'=>1,'contenu_id'=>null,'created_at'=>now(),'updated_at'=>now()],
            ['titre'=>'Podcast sur l’histoire','texte'=>'Podcast éducatif sur l’histoire.','statut'=>'Publié','typecontenu_id'=>3,'region_id'=>3,'langue_id'=>3,'user_id'=>1,'contenu_id'=>null,'created_at'=>now(),'updated_at'=>now()],
            ['titre'=>'Galerie images','texte'=>'Images des monuments historiques.','statut'=>'Publié','typecontenu_id'=>4,'region_id'=>4,'langue_id'=>4,'user_id'=>1,'contenu_id'=>null,'created_at'=>now(),'updated_at'=>now()],
            ['titre'=>'Guide PDF du tourisme','texte'=>'Guide complet en PDF.','statut'=>'Brouillon','typecontenu_id'=>5,'region_id'=>5,'langue_id'=>5,'user_id'=>1,'contenu_id'=>null,'created_at'=>now(),'updated_at'=>now()],
        ]);
    }
}

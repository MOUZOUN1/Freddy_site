<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CommentairesSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('commentaires')->insert([
            ['contenu'=>'Très intéressant !','note'=>5,'utilisateur_id'=>1,'contenu_id'=>6,'created_at'=>now(),'updated_at'=>now()],
            ['contenu'=>'Peut mieux faire','note'=>3,'utilisateur_id'=>1,'contenu_id'=>7,'created_at'=>now(),'updated_at'=>now()],
            ['contenu'=>'Bien expliqué','note'=>4,'utilisateur_id'=>1,'contenu_id'=>8,'created_at'=>now(),'updated_at'=>now()],
            ['contenu'=>'Pas mal','note'=>4,'utilisateur_id'=>1,'contenu_id'=>9,'created_at'=>now(),'updated_at'=>now()],
            ['contenu'=>'Excellent !','note'=>5,'utilisateur_id'=>1,'contenu_id'=>10,'created_at'=>now(),'updated_at'=>now()],
        ]);
    }
}

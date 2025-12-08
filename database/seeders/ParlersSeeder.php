<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ParlersSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('parlers')->insert([
            ['langue_id'=>1,'region_id'=>1,'created_at'=>now(),'updated_at'=>now()],
            ['langue_id'=>2,'region_id'=>2,'created_at'=>now(),'updated_at'=>now()],
            ['langue_id'=>3,'region_id'=>3,'created_at'=>now(),'updated_at'=>now()],
            ['langue_id'=>4,'region_id'=>4,'created_at'=>now(),'updated_at'=>now()],
            ['langue_id'=>5,'region_id'=>5,'created_at'=>now(),'updated_at'=>now()],
        ]);
    }
}

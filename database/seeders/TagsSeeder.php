<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TagsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tags')->insert([
           'title'=>'New',
       ]);
        DB::table('tags')->insert([
           'title'=>'Sale',
       ]);
        DB::table('tags')->insert([
           'title'=>'Recomendation',
       ]);
        DB::table('tags')->insert([
           'title'=>'Popular',
       ]);
    }
}

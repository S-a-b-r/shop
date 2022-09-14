<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
           'title'=>'Безалкогольное',
       ]);
        DB::table('categories')->insert([
           'title'=>'IPA',
       ]);
        DB::table('categories')->insert([
           'title'=>'APA',
       ]);
        DB::table('categories')->insert([
           'title'=>'Cider',
       ]);
        DB::table('categories')->insert([
           'title'=>'Sour ale',
       ]);
        DB::table('categories')->insert([
           'title'=>'Stout',
       ]);
        DB::table('categories')->insert([
           'title'=>'Porter',
       ]);
        DB::table('categories')->insert([
           'title'=>'Lager',
       ]);
        DB::table('categories')->insert([
           'title'=>'Gose',
       ]);
        DB::table('categories')->insert([
           'title'=>'Mead',
       ]);
        DB::table('categories')->insert([
           'title'=>'Seltzer',
       ]);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BrewerySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('breweries')->insert([
           'title'=>'4BREWERS',
           'description'=>'Ребята из локальной пивоварни 4brewers начали свое становление в далеком 2010 году.',
           'country'=>"Россия",
           'logo'=>"images/QAb6DSqfPbaKwLvlE6XblV1y6JgtXaqLaNaOEM6l.jpg",
           'rating'=>0,
       ]);
    }
}

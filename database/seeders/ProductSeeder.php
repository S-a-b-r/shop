<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
           'title'=>'Ничего святого',
           'description'=>'Монументы старым богам дают трещины. Им на смену приходят новые. Вкус и аромат — вот наша религия.',
           'abv'=>5.5,
           'ibu'=>0,
           'preview_image'=>'images/otLTtUoBJiXtqEG59VDmNoKKMcNSnJvlezXj9aNb.jpg',
           'price'=>300,
           'rating'=>0,
           'quantity'=>10,
           'is_published'=>1,
           'brewery_id'=>1,
           'category_id'=>5,
       ]);
    }
}

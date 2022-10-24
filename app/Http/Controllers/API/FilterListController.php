<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Brewery;
use App\Models\Category;
use App\Models\Product;
use App\Models\Tag;

class FilterListController extends Controller
{
    public function __invoke(){
        $categories = Category::all();
        $breweries = Brewery::all();
        $tags = Tag::all();

        $maxPrice = Product::orderBy('price', 'DESC')->first()->price;
        $minPrice = 0;

        return response()->json([
            'categories' => $categories,
            'breweries' => $breweries,
            'tags' => $tags,
            'price'=>[
                'max'=>$maxPrice,
                'min'=>$minPrice
            ],
        ]);
    }
}

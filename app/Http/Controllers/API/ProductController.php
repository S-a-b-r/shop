<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\Product\ProductResource;
use App\Models\Product;

class ProductController extends Controller
{
    public function index(){
        $products = Product::all()->where('is_published','=','1');
        return ProductResource::collection($products);
    }
}

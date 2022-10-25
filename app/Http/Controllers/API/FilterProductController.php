<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Filters\ProductFilter;
use App\Http\Requests\API\FilterRequest;
use App\Http\Resources\Product\ProductResource;
use App\Models\Product;

class FilterProductController extends Controller
{
    public function index(FilterRequest $request){

        $data = $request->validated();
        $filter = app()->make(ProductFilter::class, ['queryParams' => array_filter($data)]);

        $products = Product::filter($filter)->get();
        return ProductResource::collection($products);
    }
}

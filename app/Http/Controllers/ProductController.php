<?php

namespace App\Http\Controllers;

use App\Http\Requests\Product\StoreRequest;
use App\Http\Requests\Product\UpdateRequest;
use App\Models\Category;
use App\Models\Color;
use App\Models\ColorProduct;
use App\Models\Product;
use App\Models\ProductTag;
use App\Models\Tag;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index(){
        $products = Product::all();
        return view('product.index', compact('products'));
    }

    public function show(Product $product){
        return view('product.show', compact('product'));
    }

    public function create(){
        $tags = Tag::all();
        $categories = Category::all();
        $colors = Color::all();
        return view('product.create', compact('tags','colors','categories'));
    }

    public function store(StoreRequest $request){
        $data = $request->validated();
        $data['preview_image']= Storage::disk('public')->put('/images', $data['preview_image']);
        $tagsIds = $data['tags'];
        $colorsIds = $data['colors'];
        unset($data['colors'], $data['tags']);

        $product = Product::firstOrCreate($data);
        Product::firstOrCreate($data);

        foreach ($tagsIds as $tagId){
            ProductTag::firstOrCreate([
                'product_id'=>$product->id,
                'tag_id'=>$tagId
            ]);
        }

        foreach ($colorsIds as $colorId){
            ColorProduct::firstOrCreate([
                'product_id'=>$product->id,
                'color_id'=>$colorId
            ]);
        }
        return redirect()->route('products.index');
    }

    public function edit(Product $product){
        return view('product.edit', compact('product'));
    }

    public function update(UpdateRequest $request, Product $product){
        $data = $request->validated();
        $product->update($data);

        return view('product.show', compact('product'));
    }

    public function destroy(Product $product){
        $product->delete();

        return redirect()->route('products.index');
    }
}

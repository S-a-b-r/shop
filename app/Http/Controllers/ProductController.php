<?php

namespace App\Http\Controllers;

use App\Http\Requests\Product\StoreRequest;
use App\Http\Requests\Product\UpdateRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\ProductTag;
use App\Models\Tag;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('product.index', compact('products'));
    }

    public function show(Product $product)
    {
        return view('product.show', compact('product'));
    }

    public function create()
    {
        $tags = Tag::all();
        $categories = Category::all();
        return view('product.create', compact('tags',  'categories'));
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        $data['preview_image'] = Storage::disk('public')->put('/images', $data['preview_image']);



        $tagsIds = $data['tags'] ?? [];
        $productImages = $data['product_images'] ?? [];

        unset($data['tags'], $data['product_images']);

        $product = Product::firstOrCreate($data);

        foreach ($productImages as $productImage) {
            $file = Storage::disk('public')->put('/images', $productImage);
            ProductImage::firstOrCreate([
                'product_id' => $product->id,
                'file_path' => $file
            ]);
        }

        foreach ($tagsIds as $tagId) {
            ProductTag::firstOrCreate(['product_id' => $product->id, 'tag_id' => $tagId]);
        }

        return redirect()->route('products.index');
    }

    public function edit(Product $product)
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('product.edit', compact('product', 'categories', 'tags'));
    }

    public function update(UpdateRequest $request, Product $product)
    {
        $data = $request->validated();

        if (isset($data['preview_image'])) {
            $data['preview_image'] = Storage::disk('public')->put('/images', $data['preview_image']);
        }

        ProductTag::where('product_id', '=', $product->id)->delete();
        if (isset($data['tags'])) {
            $tagsIds = $data['tags'];
            foreach ($tagsIds as $tagId) {
                ProductTag::firstOrCreate(['product_id' => $product->id, 'tag_id' => $tagId]);
            }
        }

        unset($data['colors'], $data['tags']);

        $product->update($data);

        return redirect()->route('products.index');
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('products.index');
    }
}

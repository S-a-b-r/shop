<?php

namespace App\Http\Controllers;

use App\Http\Requests\Product\StoreRequest;
use App\Http\Requests\Product\UpdateRequest;
use App\Models\Category;
use App\Models\Color;
use App\Models\ColorProduct;
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
        $colors = Color::all();
        return view('product.create', compact('tags', 'colors', 'categories'));
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        $data['preview_image'] = Storage::disk('public')->put('/images', $data['preview_image']);



        $tagsIds = $data['tags'] ?? [];
        $colorsIds = $data['colors'] ?? [];
        $productImages = $data['product_images'] ?? [];

        unset($data['colors'], $data['tags'], $data['product_images']);

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

        foreach ($colorsIds as $colorId) {
            ColorProduct::firstOrCreate(['product_id' => $product->id, 'color_id' => $colorId]);
        }

        return redirect()->route('products.index');
    }

    public function edit(Product $product)
    {
        $categories = Category::all();
        $tags = Tag::all();
        $colors = Color::all();
        return view('product.edit', compact('product', 'categories', 'colors', 'tags'));
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

        ColorProduct::where('product_id', '=', $product->id)->delete();
        if (isset($data['colors'])) {
            $colorsIds = $data['colors'];
            foreach ($colorsIds as $colorId) {
                ColorProduct::firstOrCreate(['product_id' => $product->id, 'color_id' => $colorId]);
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

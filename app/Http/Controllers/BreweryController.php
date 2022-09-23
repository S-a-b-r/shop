<?php

namespace App\Http\Controllers;

use App\Http\Requests\Brewery\StoreRequest;
use App\Http\Requests\Brewery\UpdateRequest;
use App\Models\Brewery;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\ProductTag;
use App\Models\Tag;
use Illuminate\Support\Facades\Storage;

class BreweryController extends Controller
{
    public function index()
    {
        $breweries = Brewery::all();
        return view('brewery.index', compact('breweries'));
    }

    public function show(Brewery $brewery)
    {
        return view('brewery.show', compact('brewery'));
    }

    public function create()
    {
        return view('brewery.create');
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        $data['logo'] = Storage::disk('public')->put('/images', $data['logo']);

        Brewery::firstOrCreate($data);

        return redirect()->route('breweries.index');
    }

    public function edit(Brewery $brewery)
    {
        return view('brewery.edit', compact('brewery'));
    }

    public function update(UpdateRequest $request, Brewery $brewery)
    {
        $data = $request->validated();

        if (isset($data['logo'])) {
            $data['logo'] = Storage::disk('public')->put('/images', $data['logo']);
        }

        $brewery->update($data);

        return redirect()->route('breweries.index');
    }

    public function destroy(Brewery $brewery)
    {
        $brewery->delete();

        return redirect()->route('breweries.index');
    }
}

<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\Brewery\BreweryFullResource;
use App\Http\Resources\Brewery\BreweryResource;
use App\Models\Brewery;
use App\Models\Product;

class BreweryController extends Controller
{
    public function getFirstSix()
    {
        $breweries = Brewery::orderBy('rating')->take(6)->get();
        return BreweryResource::collection($breweries);
    }

    public function show($id)
    {
        $brewery = Brewery::find($id);
        return new BreweryFullResource($brewery);
    }
}

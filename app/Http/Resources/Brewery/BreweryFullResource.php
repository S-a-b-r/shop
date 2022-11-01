<?php

namespace App\Http\Resources\Brewery;

use App\Http\Resources\Product\ProductResource;
use Illuminate\Http\Resources\Json\JsonResource;

class BreweryFullResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'country' => $this->country,
            'logo' => $this->imageUrl,
            'rating' => $this->rating,
            'products' => ProductResource::collection($this->products),
        ];
    }
}

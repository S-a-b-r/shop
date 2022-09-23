<?php

namespace App\Http\Resources\Product;

use App\Http\Resources\Brewery\BreweryResource;
use App\Http\Resources\Category\CategoryResource;
use App\Models\Brewery;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
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
            'id'=> $this->id,
            'title'=> $this->title,
            'description'=>$this->description,
            'abv'=>$this->abv,
            'ibu'=>$this->ibu,
            'rating'=>$this->rating,
            'image_url'=>$this->imageUrl,
            'images'=> ImageResource::collection($this->images),
            'price'=>$this->price,
            'quantity'=>$this->quantity,
            'is_published'=>$this->is_published,
            'brewery' => new BreweryResource($this->brewery),
            'category'=> new CategoryResource($this->category),
        ];
    }
}

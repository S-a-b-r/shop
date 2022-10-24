<?php

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;

class ProductFilter extends AbstractFilter
{
    protected function getCallbacks(): array
    {
        return [
            'title' => [$this, 'title'],
            'categories' => [$this, 'categories'],
            'breweries' => [$this, 'breweries'],
            'price' => [$this, 'price'],
            'tags' => [$this, 'tags'],
        ];
    }

    public function title(Builder $builder, $value)
    {
        $builder->where('title','like',"%{$value}%");
    }

    public function categories(Builder $builder, $value)
    {
        $builder->whereIn('category_id',  $value);
    }

    public function price(Builder $builder, array $value)
    {
        $builder->whereBetween('price',  $value['min'], $value['max']);
    }

    public function tags(Builder $builder, $value)
    {
        $builder->where('tags', function ($b) use ($value)
        {
           $b->whereIn('tag_id', $value);
        });
    }

    public function breweries(Builder $builder, $value)
    {
        $builder->whereIn('brewery_id',  $value);
    }
}

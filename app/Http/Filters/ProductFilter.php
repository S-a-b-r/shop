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
            'prices' => [$this, 'prices'],
            'tags' => [$this, 'tags'],
            'sorted_by' => [$this, 'sortedBy'],
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

    public function prices(Builder $builder, array $value)
    {
        $builder->whereBetween('price',  $value);
    }

    public function tags(Builder $builder, $value)
    {
        $builder->leftJoin('product_tags', 'products.id', '=', 'product_tags.product_id')->whereIn('product_tags.tag_id', $value);
    }

    public function breweries(Builder $builder, $value)
    {
        $builder->whereIn('brewery_id',  $value);
    }

    public function sortedBy(Builder $builder, $value)
    {
        switch ($value)
        {
            case 2: {
                $column = 'created_at';
                $direction = 'ASC';
                break;
            }
            case 3: {
                $column = 'title';
                $direction = 'ASC';
                break;
            }
            case 4: {
                $column = 'title';
                $direction = 'DESC';
                break;
            }
            case 5: {
                $column = 'price';
                $direction = 'ASC';
                break;
            }
            case 6: {
                $column = 'price';
                $direction = 'DESC';
                break;
            }
            default:
                {
                    $column = 'created_at';
                    $direction = 'DESC';
                }
        }

        $builder->orderBy('products.'.$column, $direction);
    }
}

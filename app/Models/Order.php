<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $guarded = false;

    public function products(){
        return $this->belongsToMany(Product::class, 'products_orders', 'id_order', 'id_product');
    }
}

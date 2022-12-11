<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = false;

    public const STATUS_COLLECT = 0;
    public const STATUS_SENT = 1;
    public const STATUS_RECEIVED = 2;

    public function user(){
        return $this->belongsTo(User::class, 'id_user', 'id');
    }

    public function products(){
        return $this->belongsToMany(Product::class, 'products_orders', 'id_order', 'id_product');
    }

    public function countProduct($product){
        return ProductsOrder::where('id_order',$this->id)->where('id_product',$product)->first();
    }
}

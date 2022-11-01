<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brewery extends Model
{
    protected $table = 'breweries';
    protected $guarded = false;

    public function getImageUrlAttribute(){
        return url('storage/'.$this->logo);
    }

    public function products(){
        return $this->hasMany(Product::class, 'brewery_id','id');
    }

}

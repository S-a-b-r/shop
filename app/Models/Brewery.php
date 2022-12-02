<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Brewery extends Model
{
    use SoftDeletes;
    protected $table = 'breweries';
    protected $guarded = false;

    public function getImageUrlAttribute(){
        return url('storage/'.$this->logo);
    }

    public function products(){
        return $this->hasMany(Product::class, 'brewery_id','id');
    }

}

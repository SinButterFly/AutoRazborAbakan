<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brands extends Model
{
    protected $table = 'brands';
    protected $fillable = [
        'brand', 'photo'
    ];

    public function products_brand(){
        return $this->hasMany('App\Products');
    }
    public function products_model(){
        return $this->hasMany('App\Products');
    }
}

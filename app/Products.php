<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $table = 'products';
    protected $fillable =[
        'brand_id', 'model_id', 'photo', 'name', 'description', 'price', 'vendor_code', 'count', 'category_id'
    ];

    public function brand(){
        return $this->belongsTo(Brands::class, 'brand_id', 'id');
    }

    public function model(){
        return $this->belongsTo(Models::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}

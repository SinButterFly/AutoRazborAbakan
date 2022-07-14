<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
        'name', 'phone'
    ];

    public function products()
    {
        return $this->belongsToMany('App\Products', 'orders', 'customer_id', 'product_id');
    }
}

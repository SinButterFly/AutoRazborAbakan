<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomerOrder extends Model
{
    protected $table = 'orders';
    protected $fillable = [
        'product_id', 'customer_id'
    ];
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserCart extends Model
{
    protected $table = 'carts';
    protected $fillable = [
        'product_id', 'user_ip'
    ];

}

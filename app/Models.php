<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Models extends Model
{
    protected $table = 'models';
    protected $fillable = [
        'model', 'brand_id'
    ];

    public function model_brand()
    {
        return $this->belongsTo(Brands::class, 'brand_id', 'id');
    }
}


<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'serial_number',
        'product_name',
        'product_picture',
        'xrf_image',
        'manufacturing_date',
        'weight',
        'weight_unit',
        'purity',
    ];

    protected $casts = [
        'manufacturing_date' => 'date',
    ];
}

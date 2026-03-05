<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'serial_number',
        'product_name',
        'product_picture',
        'manufacturing_date',
    ];

    protected $casts = [
        'manufacturing_date' => 'date',
    ];
}

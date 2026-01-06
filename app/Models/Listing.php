<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    protected $fillable = [
        'user_id',
        'store_id',
        'title',
        'category',
        'price',
        'stock',
        'delivery_methods',
        'description',
        'tags',
        'status',
    ];

    protected $casts = [
        'delivery_methods' => 'array',
    ];
}

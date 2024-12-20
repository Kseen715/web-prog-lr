<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $table = 'items';

    protected $fillable = [
        'name',
        'image_url',
        'description',
        'date',
        'count',
        'shelf_id',
    ];

    protected $casts = [
        'date' => 'datetime',
        'count' => 'integer',
    ];
}
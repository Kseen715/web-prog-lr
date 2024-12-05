<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Shelf extends Model
{
    protected $table = 'shelves';

    protected $fillable = [
        'name',
        'warehouse_id',        
    ];

    public function warehouse()
    {
        return $this->belongsTo(Warehouse::class);
    }
}
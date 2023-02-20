<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'explanation',
        'price',
        'stock',
    ];

    public function carts()
    {
        return $this->hasMany(Cart::class);
    }
}

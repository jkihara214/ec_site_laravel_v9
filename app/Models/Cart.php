<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\facades\Auth;
use Illuminate\Support\Facades\DB;
use Exception;

class Cart extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'item_id',
        'quantity',
    ];
    protected $table = 'carts';

    public function item() {
        //リレーション 主Item 従Cart
        return $this->belongsTo('App\Models\Item', 'item_id', 'id');
    }


    public function subtotal() {
        $result = $this->item->price * $this->quantity;
        return $result;
    }
}

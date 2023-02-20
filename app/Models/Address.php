<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Address extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name', 
        'user_id', 
        'post_code', 
        'prefecture', 
        'municipalities', 
        'subsequent_address', 
        'phone_num'
    ];

    protected $table = 'addresses';

    public function user() {
        //リレーション 主User 従Address
        return $this->belongsTo(User::class);
    }
}

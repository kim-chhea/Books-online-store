<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'status' , 'total' ,'user_id'
    ];
    public function user()
    {
       return $this->belongsTo(User::class) ;
    }
}

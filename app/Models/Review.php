<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
protected $fillable = [
    'rating' , 'comment' ,'user_id','book_id'
];

public function user()
{
    return $this->belongsTo(User::class);
}
public function book()
{
  return $this->belongsTo(Book::class);
}
}

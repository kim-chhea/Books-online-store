<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
  protected $fillable = [
    'author' , 'title' , 'price' , 'rating' , 'cover_image'
  ];
}

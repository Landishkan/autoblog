<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
  
    protected $fillable = [
      'brand', 'model', 'year', 'price', 'description', 
    'is_published', 'image', 'status', 'old_price', 'is_featured'
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = [
    'client_name',
    'client_photo',
    'car_model',
    'text',
    'rating',
    'is_published',
    'profit_amount'
];

protected $casts = [
    'is_published' => 'boolean',
    'rating' => 'integer'
];
}

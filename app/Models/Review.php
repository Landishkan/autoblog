<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = [
    'client_name', 
    'car_model', 
    'text', 
    'profit_amount', 
    'video_url'
];
}

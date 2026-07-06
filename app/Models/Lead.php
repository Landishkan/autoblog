<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    protected $fillable = [
        'name',
        'phone',
        'car_number',
        'service_type',
        'status',
        'notes'
    ];

    protected $casts = [
        'status' => 'string'
    ];
}
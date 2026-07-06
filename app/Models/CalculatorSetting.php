<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CalculatorSetting extends Model
{
    protected $fillable = [
        'type',
        'min_amount',
        'max_amount',
        'min_term',
        'max_term',
        'rate',
        'description'
    ];

    protected $casts = [
        'min_amount' => 'decimal:2',
        'max_amount' => 'decimal:2',
        'rate' => 'decimal:2'
    ];
}
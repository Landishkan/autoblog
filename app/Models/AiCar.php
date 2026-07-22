<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AiCar extends Model
{
    protected $table = 'ai_cars';

    protected $fillable = [
        'brand',
        'model',
        'year',
        'price',
        'body_type',
        'engine_type',
        'engine_volume',
        'horsepower',
        'transmission',
        'drive_type',
        'fuel_consumption',
        'seats',
        'trunk_volume',
        'category',
        'features',
        'ai_description',
        'image',
        'is_available',
        'is_recommended',
    ];

    protected $casts = [
        'features' => 'array',
        'price' => 'decimal:2',
        'fuel_consumption' => 'decimal:1',
        'is_available' => 'boolean',
        'is_recommended' => 'boolean',
    ];

    // Метод для ИИ-поиска (потом используем)
    public function scopeAvailable($query)
    {
        return $query->where('is_available', true);
    }

    public function scopeRecommended($query)
    {
        return $query->where('is_recommended', true);
    }
}
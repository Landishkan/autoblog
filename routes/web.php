<?php

use App\Models\Car;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // Берем только опубликованные машины
    $cars = Car::where('is_published', true)->get(); 
    
    return view('welcome', ['cars' => $cars]);
});
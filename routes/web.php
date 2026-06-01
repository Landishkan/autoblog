<?php

use App\Models\Car;
use Illuminate\Support\Facades\Route;

use App\Models\Post;
use App\Models\Review;

Route::get('/', function () {
    return view('welcome', [
        'cars' => Car::where('is_published', true)->take(6)->get(),
        'posts' => Post::latest()->take(3)->get(), // Берем 3 последние статьи
        'reviews' => Review::latest()->take(3)->get(), // Берем 3 последних отзыва
    ]);
});
Route::view('/trade-in', 'trade-in');
Route::view('/credit', 'credit');
Route::view('/blog', 'blog');
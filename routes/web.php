<?php

use App\Models\Car;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LeadController;
use App\Http\Controllers\CreditTradeInController;
use App\Http\Controllers\ReviewsController;
use App\Http\Controllers\ChatbotController;

Route::get('/chatbot', [ChatbotController::class, 'index'])->name('chatbot.index');
// Главная страница
Route::get('/', [HomeController::class, 'index'])->name('home');

// Кредит / Trade-In
Route::get('/credit-trade-in', [CreditTradeInController::class, 'index'])->name('credit-trade-in');

// Отзывы
Route::get('/reviews', [ReviewsController::class, 'index'])->name('reviews.index');
Route::post('/reviews', [ReviewsController::class, 'store'])->name('reviews.store');

// Заявки
Route::post('/leads', [LeadController::class, 'store'])->name('leads.store');

// Заглушки для старых страниц (можно удалить если не нужны)
Route::view('/trade-in', 'trade-in');
Route::view('/credit', 'credit');
Route::view('/blog', 'blog');
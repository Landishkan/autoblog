<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class ReviewsController extends Controller
{
    public function index()
{
    $reviews = Review::where('is_published', true)
        ->orderByDesc('created_at')
        ->paginate(12);
    
    return view('reviews', compact('reviews'));
}
    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'client_name' => 'required|string|max:255',
            'car_model' => 'nullable|string|max:255',
            'text' => 'required|string|min:10',
            'rating' => 'required|integer|min:1|max:5',
        ]);
        
        $validated['is_published'] = false; // Новые отзывы требуют модерации
        
        Review::create($validated);
        
        return redirect()->back()->with('success', 'Спасибо за отзыв! Он появится после модерации.');
    }
}
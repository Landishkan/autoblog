<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Step;
use App\Models\Review;

class HomeController extends Controller
{
    public function index()
    {
        $steps = Step::orderBy('order')->get();
        $reviews = Review::where('is_published', true)->orderByDesc('created_at')->take(5)->get();
        
        return view('home', compact('steps', 'reviews'));
    }
}
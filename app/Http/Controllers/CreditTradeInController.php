<?php

namespace App\Http\Controllers;

use App\Models\Example;
use App\Models\Review;
use App\Models\CalculatorSetting;
use Illuminate\Http\Request;
class CreditTradeInController extends Controller
{
    public function index()
    {
        $creditExamples = Example::where('service_type', 'credit')->get();
        $tradeInExamples = Example::where('service_type', 'trade-in')->get();
        $reviews = Review::where('is_published', true)->orderByDesc('created_at')->take(5)->get();
        
        $creditSettings = CalculatorSetting::where('type', 'credit')->first();
        $tradeInSettings = CalculatorSetting::where('type', 'trade-in')->first();
        
        return view('credit-trade-in', compact(
            'creditExamples', 
            'tradeInExamples', 
            'reviews',
            'creditSettings',
            'tradeInSettings'
        ));
    }
}
<?php

namespace App\Http\Controllers;

use App\Models\Lead;
use Illuminate\Http\Request;

class LeadController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'nullable|string|max:255',
            'phone' => 'required|string|max:20',
            'car_number' => 'nullable|string|max:20',
            'service_type' => 'required|in:credit,trade-in,general',
        ]);
        
        Lead::create($validated);
        
        // TODO: Отправка email менеджеру
        
        return redirect()->back()->with('success', 'Заявка отправлена! Мы свяжемся с вами в ближайшее время.');
    }
}
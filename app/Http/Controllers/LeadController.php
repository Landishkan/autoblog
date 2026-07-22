<?php

namespace App\Http\Controllers;

use App\Models\Lead;
use Illuminate\Http\Request;

use Illuminate\Validation\ValidationException;

class LeadController extends Controller
{
    public function store(Request $request)
    {
        try {
            // 1. Валидация данных
            $validated = $request->validate([
                'name' => 'nullable|string|max:255',
                'phone' => 'required|string|max:20',
                'car_number' => 'nullable|string|max:20',
                'service_type' => 'required|in:credit,trade-in,general',
                'entity_type' => 'required|in:physical,legal',
            ]);

            // 2. Создание заявки
            Lead::create($validated);

            // 3. Возвращаем четкий JSON-ответ
            return response()->json([
                'success' => true,
                'message' => 'Заявка успешно отправлена!'
            ]);

        } catch (ValidationException $e) {
            // Если ошибка валидации, возвращаем JSON с описанием ошибок
            return response()->json([
                'success' => false,
                'errors' => $e->errors()
            ], 422);
            
        } catch (\Exception $e) {
            // Если любая другая ошибка (например, база данных), ловим её
            return response()->json([
                'success' => false,
                'message' => 'Произошла ошибка сервера: ' . $e->getMessage()
            ], 500);
        }
    }
}
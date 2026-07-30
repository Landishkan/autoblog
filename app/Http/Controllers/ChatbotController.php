<?php

namespace App\Http\Controllers;

use App\Models\AiCar;
use Illuminate\Http\Request;

class ChatbotController extends Controller
{
    public function index()
    {
        return view('chatbot');
    }

   public function message(Request $request)
{
    $text = mb_strtolower($request->input('message'));
    
    // 1. Пытаемся вытащить бюджет (например, "до 3 млн" или "до 3000000")
    $priceLimit = null;
    if (preg_match('/до\s+(\d+)/i', $text, $matches)) {
        $priceLimit = (int)$matches[1];
        // Если число маленькое (например, 3), считаем что это миллионы
        if ($priceLimit < 100) {
            $priceLimit *= 1000000;
        }
    }

    // 2. Пытаемся определить тип кузова по ключевым словам
    $bodyType = null;
    $bodyKeywords = [
        'кроссовер' => 'suv', 'внедорожник' => 'suv', 'джип' => 'suv', 'suv' => 'suv',
        'седан' => 'sedan',
        'хэтчбек' => 'hatchback', 'хетчбек' => 'hatchback',
        'универсал' => 'wagon',
        'минивэн' => 'minivan', 'минивен' => 'minivan',
        'купе' => 'coupe',
        'кабриолет' => 'convertible',
        'пикап' => 'pickup',
    ];
    
    foreach ($bodyKeywords as $key => $val) {
        if (mb_strpos($text, $key) !== false) {
            $bodyType = $val;
            break;
        }
    }

    // 3. Пытаемся определить КАТЕГОРИЮ по ключевым словам
// 3. Пытаемся определить КАТЕГОРИЮ по ключевым словам
$category = null;
$categoryKeywords = [
    // Семейный
    'семейный' => 'family', 'семейная' => 'family', 'семейное' => 'family', 
    'семейные' => 'family', 'семейным' => 'family', 'семейную' => 'family',
    'для семьи' => 'family', 'для семьи' => 'family', 'семьи' => 'family',
    
    // Спортивный
    'спортивный' => 'sport', 'спортивная' => 'sport', 'спортивное' => 'sport',
    'спортивные' => 'sport', 'спортивным' => 'sport', 'спортивную' => 'sport',
    'спорт' => 'sport', 'динамичный' => 'sport', 'динамичная' => 'sport',
    'динамичную' => 'sport',
    
    // Экономичный
    'экономичный' => 'economy', 'экономичная' => 'economy', 'экономичную' => 'economy',
    'эконом' => 'economy', 'бюджетный' => 'economy', 'бюджетная' => 'economy',
    'бюджетную' => 'economy', 'недорогой' => 'economy', 'недорогая' => 'economy',
    'недорогую' => 'economy', 'дешевый' => 'economy', 'дешевая' => 'economy',
    
    // Премиум / Бизнес
    'премиум' => 'premium', 'премиальный' => 'premium', 'премиальная' => 'premium',
    'премиальную' => 'premium', 'люкс' => 'premium', 'люксовый' => 'premium',
    'люксовая' => 'premium', 'люксовую' => 'premium',
    'бизнес' => 'business', 'бизнес-класс' => 'business', 'бизнес класс' => 'business',
    
    // Городской
    'городской' => 'city', 'городская' => 'city', 'городское' => 'city',
    'городские' => 'city', 'городским' => 'city', 'городскую' => 'city',
    'для города' => 'city', 'компактный' => 'city', 'компактная' => 'city',
    'компактную' => 'city', 'маневренный' => 'city', 'маневренная' => 'city',
    
    // Внедорожник / Полный привод
    'внедорожник' => 'offroad', 'внедорожный' => 'offroad', 'внедорожная' => 'offroad',
    'внедорожную' => 'offroad', 'полный привод' => 'offroad', 'полноприводный' => 'offroad',
    'полноприводная' => 'offroad', 'полноприводную' => 'offroad', 
    '4x4' => 'offroad', 'четыре на четыре' => 'offroad',
];

foreach ($categoryKeywords as $key => $val) {
    if (mb_strpos($text, $key) !== false) {
        $category = $val;
        break;
    }
}
    foreach ($categoryKeywords as $key => $val) {
        if (mb_strpos($text, $key) !== false) {
            $category = $val;
            break;
        }
    }

    // 4. Делаем запрос к базе данных
    $query = AiCar::where('is_available', true);
    
    if ($priceLimit) {
        $query->where('price', '<=', $priceLimit);
    }
    if ($bodyType) {
        $query->where('body_type', $bodyType);
    }
    if ($category) {
        $query->where('category', $category);
    }

    // Берем только топ-3 машины, чтобы не перегружать чат
    $cars = $query->limit(3)->get();

    // 5. Формируем ответ
    if ($cars->isEmpty()) {
        $reply = "К сожалению, по вашему запросу в нашей базе ничего не нашлось. 😔\n\n";
        
        if ($category || $bodyType || $priceLimit) {
            $reply .= "Попробуйте:\n";
            if ($priceLimit) $reply .= "• Увеличить бюджет\n";
            if ($bodyType) $reply .= "• Изменить тип кузова\n";
            if ($category) $reply .= "• Выбрать другую категорию\n";
            $reply .= "\nИли оставьте заявку, и наш менеджер подберет для вас идеальный вариант вручную!";
        } else {
            $reply .= "Опишите, что вы ищете (например: «седан до 2 млн» или «семейный кроссовер»), и я помогу!";
        }
    } else {
        $reply = "Я нашел несколько отличных вариантов, которые подходят под ваш запрос! 👇\n\n";
        
        foreach ($cars as $car) {
            $priceFormatted = number_format($car->price, 0, '.', ' ');
            $reply .= "🚗 **{$car->brand} {$car->model}** ({$car->year} г.)\n";
            $reply .= "💰 Цена: {$priceFormatted} ₽\n";
            
            // Добавляем информацию о кузове и категории
            $bodyTypeText = match($car->body_type) {
                'sedan' => 'Седан',
                'suv' => 'Внедорожник',
                'hatchback' => 'Хэтчбек',
                'wagon' => 'Универсал',
                'coupe' => 'Купе',
                'convertible' => 'Кабриолет',
                'minivan' => 'Минивэн',
                'pickup' => 'Пикап',
                default => $car->body_type,
            };
            
            $categoryText = match($car->category) {
                'family' => 'Семейный',
                'sport' => 'Спортивный',
                'economy' => 'Экономичный',
                'premium' => 'Премиум',
                'offroad' => 'Внедорожник',
                'city' => 'Городской',
                'business' => 'Бизнес',
                default => '',
            };
            
            if ($categoryText) {
                $reply .= " Категория: {$categoryText}\n";
            }
            $reply .= " Кузов: {$bodyTypeText}\n";
            
            if ($car->ai_description) {
                $reply .= "📝 {$car->ai_description}\n";
            }
            $reply .= "\n";
        }
        
        $reply .= "Понравилось что-то из этого? Напишите **«Хочу заявку»**, и мы свяжемся с вами!";
    }

    return response()->json([
        'text' => $reply,
        'cars' => $cars->map(fn($car) => [
            'id' => $car->id,
            'brand' => $car->brand,
            'model' => $car->model,
            'price' => $car->price,
            'image' => $car->image ? asset('storage/' . $car->image) : null,
        ])
    ]);
}
}
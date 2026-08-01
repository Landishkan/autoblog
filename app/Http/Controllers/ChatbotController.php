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
    // 1. Нормализация текста: нижний регистр и удаление лишних пробелов
    $text = mb_strtolower(trim($request->input('message')));
    
    // 2. Умное извлечение бюджета (понимает: "до 3 млн", "от 3000000", "бюджет 5 миллионов")
    $priceLimit = null;
    $priceMode = null; // 'max' (до), 'min' (от), 'approx' (около/бюджет)

    if (preg_match('/(?:до|не дороже|максимум)\s+([\d\.]+)/i', $text, $matches)) {
        $priceLimit = (float)$matches[1];
        $priceMode = 'max';
    } elseif (preg_match('/(?:от|не дешевле|минимум)\s+([\d\.]+)/i', $text, $matches)) {
        $priceLimit = (float)$matches[1];
        $priceMode = 'min';
    } elseif (preg_match('/(?:бюджет|цена|около|примерно)\s+([\d\.]+)/i', $text, $matches)) {
        $priceLimit = (float)$matches[1];
        $priceMode = 'approx';
    }

    // Конвертация в рубли (если число меньше 1000, считаем, что это миллионы: "3" -> 3000000)
    if ($priceLimit !== null && $priceLimit < 1000) {
        $priceLimit *= 1000000;
    }

    // 3. Словари триггеров (используем корни слов для охвата всех падежей!)
    $triggers = [
        'body_type' => [
            'suv'         => ['кроссовер', 'внедорожник', 'джип', 'паркетник', 'suv', 'джып'],
            'sedan'       => ['седан', 'седанчик'],
            'hatchback'   => ['хэтчбек', 'хетчбек', 'хэтч'],
            'wagon'       => ['универсал', 'универ'],
            'minivan'     => ['минивэн', 'минивен', 'каблук'],
            'coupe'       => ['купе'],
            'convertible' => ['кабриолет', 'кабрик'],
            'pickup'      => ['пикап'],
        ],
        'category' => [
            // Корни слов: 'семейн' найдет "семейный", "семейную", "семейное" и т.д.
            'family'   => ['семейн', 'для семьи', 'детск', 'безопасн', 'просторн'],
            'sport'    => ['спорт', 'динамичн', 'быстр', 'мощн', 'гоночн', 'драйв', 'разгон'],
            'economy'  => ['эконом', 'бюджетн', 'недорог', 'дешев', 'практичн', 'расход'],
            'premium'  => ['премиум', 'премиальн', 'люкс', 'люксов', 'бизнес', 'дорог', 'статусн', 'представительск'],
            'city'     => ['городск', 'компактн', 'маневренн', 'парковк', 'маленьк', 'юрк'],
            'offroad'  => ['полн.*привод', '4x4', 'четыре на четыре', 'грязь', 'бездорожь', 'джип'],
        ],
        // Специальные сценарные триггеры
        'vibes' => [
            'cool'      => ['крут', 'мощн', 'огонь', 'топ', 'шикарн', 'роскошн', 'мечта'],
            'reliable'  => ['надежн', 'хорош', 'качественн', 'проверенн', 'не ломает', 'долговечн', 'ресурс'],
        ]
    ];

    // 4. Функция для проверки наличия корня слова в тексте
    $hasKeyword = function($text, $keywords) {
        foreach ($keywords as $kw) {
            // Если в ключе есть .* (как у 'полн.*привод'), используем preg_match, иначе mb_strpos
            if (str_contains($kw, '.*')) {
                if (preg_match('/' . $kw . '/iu', $text)) return true;
            } else {
                if (mb_strpos($text, $kw) !== false) return true;
            }
        }
        return false;
    };

    $bodyType = null;
    $category = null;
    $wantsCoolCar = false;
    $wantsReliableCar = false;

    // Определяем кузов
    foreach ($triggers['body_type'] as $type => $keywords) {
        if ($hasKeyword($text, $keywords)) {
            $bodyType = $type;
            break; // Берем первое совпадение
        }
    }

    // Определяем категорию
    foreach ($triggers['category'] as $cat => $keywords) {
        if ($hasKeyword($text, $keywords)) {
            $category = $cat;
            break;
        }
    }

    // Определяем "вайб" (настроение запроса)
    if ($hasKeyword($text, $triggers['vibes']['cool'])) {
        $wantsCoolCar = true;
    }
    if ($hasKeyword($text, $triggers['vibes']['reliable'])) {
        $wantsReliableCar = true;
    }

    // 5. Корректировка логики цены на основе "вайба"
    // Если просят "крутую" машину, но не указали цену, ставим минимум 3 млн
    if ($wantsCoolCar && $priceLimit === null) {
        $priceMode = 'min';
        $priceLimit = 3000000;
    }
    
    // Если просят "надежную", но не указали категорию, отдаем предпочтение семейным или эконом (как самым проверенным)
    if ($wantsReliableCar && $category === null) {
        // Не жестко фильтруем, но можно добавить логику сортировки или фоллбэка
    }

    // 6. Формирование запроса к БД
    $query = \App\Models\AiCar::where('is_available', true);
    
    if ($priceMode === 'max' && $priceLimit) {
        $query->where('price', '<=', $priceLimit);
    } elseif ($priceMode === 'min' && $priceLimit) {
        $query->where('price', '>=', $priceLimit);
    } elseif ($priceMode === 'approx' && $priceLimit) {
        // "Около" = плюс-минус 20% от указанной суммы
        $min = $priceLimit * 0.8;
        $max = $priceLimit * 1.2;
        $query->whereBetween('price', [$min, $max]);
    }

    if ($bodyType) {
        $query->where('body_type', $bodyType);
    }
    if ($category) {
        $query->where('category', $category);
    }

    // Сортировка: если ищут "крутую", сортируем по цене (убывание), если "эконом" - по цене (возрастание)
    if ($wantsCoolCar || $category === 'premium' || $category === 'sport') {
        $query->orderBy('price', 'desc');
    } elseif ($category === 'economy') {
        $query->orderBy('price', 'asc');
    } else {
        $query->inRandomOrder(); // Или orderBy('created_at', 'desc')
    }

    $cars = $query->limit(3)->get();

    // 7. Формирование "человечного" ответа
    if ($cars->isEmpty()) {
        $reply = "К сожалению, прямо сейчас в нашей базе нет идеальных совпадений по вашему запросу. 😔\n\n";
        $reply .= "Но это не повод расстраиваться! ";
        
        if ($priceMode === 'min' && $priceLimit >= 3000000) {
            $reply .= "В сегменте премиальных авто цены часто меняются. ";
        }
        
        $reply .= "Оставьте заявку (напишите **«Хочу заявку»**), и наш менеджер лично подберет для вас лучший вариант, даже если его еще нет на сайте!";
    } else {
        // Динамическое приветствие в зависимости от контекста
        if ($wantsCoolCar) {
            $reply = "Отличный вкус! 🔥 Для тех, кто ценит мощь и стиль, я подобрал эти варианты:\n\n";
        } elseif ($wantsReliableCar) {
            $reply = "Правильный подход! Надежность и качество — это главное. Вот проверенные варианты, которые вас не подведут:\n\n";
        } elseif ($category === 'economy') {
            $reply = "Понимаю, практичность важна! Вот лучшие предложения по соотношению цена/качество:\n\n";
        } else {
            $reply = "Я проанализировал ваш запрос и нашел несколько отличных вариантов, которые вам подойдут! 👇\n\n";
        }
        
        foreach ($cars as $car) {
            $priceFormatted = number_format($car->price, 0, '.', ' ');
            $reply .= "🚗 **{$car->brand} {$car->model}** ({$car->year} г.)\n";
            $reply .= "💰 Цена: {$priceFormatted} ₽\n";
            
            $bodyTypeText = match($car->body_type) {
                'sedan' => 'Седан', 'suv' => 'Кроссовер/Внедорожник', 'hatchback' => 'Хэтчбек',
                'wagon' => 'Универсал', 'coupe' => 'Купе', 'convertible' => 'Кабриолет',
                'minivan' => 'Минивэн', 'pickup' => 'Пикап', default => $car->body_type,
            };
            
            $categoryText = match($car->category) {
                'family' => 'Семейный', 'sport' => 'Спортивный', 'economy' => 'Экономичный',
                'premium' => 'Премиум', 'offroad' => 'Внедорожный', 'city' => 'Городской',
                'business' => 'Бизнес-класс', default => '',
            };
            
            if ($categoryText) $reply .= "🏷 Категория: {$categoryText}\n";
            $reply .= "🚙 Кузов: {$bodyTypeText}\n";
            
            if ($car->ai_description) {
                $reply .= "💬 {$car->ai_description}\n";
            }
            $reply .= "\n";
        }
        
        $reply .= "Нравится какой-то из вариантов? Напишите **«Хочу заявку»**, и мы забронируем его для вас или организуем тест-драйв!";
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
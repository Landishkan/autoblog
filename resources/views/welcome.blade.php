<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>АвтоБлог</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        * { font-family: 'Manrope', sans-serif; }
    </style>
</head>
<body class="bg-[#FBF7F0] p-0">

    <!-- Шапка -->
    <header class="bg-[#2C1810] sticky top-0 z-50 shadow-md">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <a href="/" class="text-2xl font-extrabold text-white tracking-tight">
                    Avto<span class="text-[#C8963E]">Blog</span>
                </a>
                <nav class="hidden lg:flex items-center space-x-8">
                    <a href="/" class="text-white/70 hover:text-[#C8963E] transition-colors text-sm font-medium">Главная</a>
                    <a href="/trade-in" class="text-white/70 hover:text-[#C8963E] transition-colors text-sm font-medium">Trade‑In</a>
                    <a href="/credit" class="text-white/70 hover:text-[#C8963E] transition-colors text-sm font-medium">Кредит</a>
                    <a href="/blog" class="text-white/70 hover:text-[#C8963E] transition-colors text-sm font-medium">Блог</a>
                    <a href="/reviews" class="text-white/70 hover:text-[#C8963E] transition-colors text-sm font-medium">Отзывы</a>
                </nav>
                <a href="#" class="hidden lg:inline-flex bg-[#C8963E] hover:bg-[#B8860B] text-white font-bold px-5 py-2 rounded-lg text-sm transition-all">
                    Оценить авто
                </a>
            </div>
        </div>
    </header>

   
    <!-- Hero: Оценка авто -->
<section class="py-16 px-6">
    <div class="max-w-4xl mx-auto text-center">
        <div class="inline-flex items-center px-4 py-1.5 rounded-full bg-[#0D7377]/10 text-[#0D7377] text-xs font-bold uppercase tracking-widest mb-6">
            Онлайн-аукцион для продажи авто
        </div>
        <h1 class="text-5xl md:text-7xl font-extrabold text-[#2C1810] leading-none mb-4">
            Продайте авто<br>
            <span class="text-[#C8963E]">за 2 часа</span> без перекупов
        </h1>
        <p class="text-lg text-[#2C1810]/60 mb-10 max-w-xl mx-auto leading-relaxed">
            Тысячи дилеров торгуются за вашу машину онлайн. Вы просто смотрите и выбираете лучшую цену.
        </p>

        <!-- Форма оценки -->
        <div class="bg-white rounded-3xl shadow-xl border border-[#C8963E]/10 p-6 max-w-lg mx-auto">
            <p class="text-sm text-[#2C1810]/50 mb-4 text-left">
                Введите госномер — данные заполнятся автоматически
            </p>
            
            <div class="space-y-4">
                <!-- Госномер -->
                <input
                    type="text"
                    placeholder="Госномер, например А123БВ177"
                    class="w-full bg-[#FBF7F0] border border-[#C8963E]/20 rounded-xl px-5 py-4 text-[#2C1810] placeholder-[#2C1810]/40 focus:outline-none focus:border-[#C8963E] focus:ring-4 focus:ring-[#C8963E]/10 transition-all text-lg font-medium"
                >
                
                <!-- Email -->
                <input
                    type="tell"
                    placeholder="+7 (___) ___-__-__"
                    class="w-full bg-[#FBF7F0] border border-[#C8963E]/20 rounded-xl px-5 py-4 text-[#2C1810] placeholder-[#2C1810]/40 focus:outline-none focus:border-[#C8963E] focus:ring-4 focus:ring-[#C8963E]/10 transition-all text-lg font-medium"
                >
            </div>

            <p class="text-xs text-[#2C1810]/40 mt-4 text-left">
                Введите свой номер телефона, чтобы с вами связался наш менеджер
            </p>

            <!-- Чекбокс -->
            <label class="flex items-start gap-3 mt-4 text-left cursor-pointer group">
                <input type="checkbox" class="mt-0.5 w-5 h-5 rounded border-[#C8963E]/30 text-[#C8963E] focus:ring-[#C8963E] cursor-pointer">
                <span class="text-xs text-[#2C1810]/50 group-hover:text-[#2C1810]/70 transition-colors leading-relaxed">
                    Я согласен с <a href="#" class="text-[#0D7377] underline hover:text-[#C8963E]">правилами обработки данных</a> и <a href="#" class="text-[#0D7377] underline hover:text-[#C8963E]">условиями сервиса</a>
                </span>
            </label>

            <!-- Кнопка -->
            <button class="w-full bg-[#C8963E] hover:bg-[#B8860B] text-white font-bold py-4 rounded-xl transition-all shadow-lg shadow-[#C8963E]/25 hover:shadow-xl mt-5 text-lg">
                Узнать стоимость
            </button>

            <!-- Партнёры -->
            <div class="flex items-center justify-center mt-5 space-x-4 text-xs text-[#2C1810]/30">
                <span>Яндекс</span>
                <span>Сбер</span>
                <span>Альфа</span>
                <span>Т-Банк</span>
            </div>
        </div>
    </div>
</section>

    <h2 class="text-3xl font-extrabold text-[#2C1810] mb-8 px-8">Наши автомобили</h2>

    <!-- Карточки автомобилей -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8 px-8 pb-12">
        @foreach($cars as $car)
            <div class="flex flex-col bg-white rounded-2xl shadow-lg overflow-hidden border border-[#C8963E]/10 transition-transform hover:scale-[1.02]">
                
                <div class="relative h-56 w-full bg-[#F5EDE3]">
                    @if($car->image)
                        <img src="{{ Storage::url($car->image) }}" class="w-full h-full object-cover" alt="{{ $car->model }}">
                    @else
                        <div class="flex items-center justify-center h-full text-[#C8963E]/30">Нет фото</div>
                    @endif
                    
                    <div class="absolute top-3 right-3 px-3 py-1 rounded-full text-[10px] uppercase font-black tracking-wider shadow-md 
                        {{ $car->status === 'available' ? 'bg-[#0D7377]' : 'bg-red-500' }} text-white">
                        {{ $car->status === 'available' ? 'В наличии' : 'Продано' }}
                    </div>
                </div>

                <div class="p-6 flex flex-col flex-grow">
                    <div class="mb-4">
                        <h3 class="text-xl font-bold text-[#2C1810] leading-tight">
                            {{ $car->brand }} {{ $car->model }}
                        </h3>
                        <p class="text-[#2C1810]/50 text-sm font-medium">{{ $car->year }} года выпуска</p>
                    </div>

                    <p class="text-[#2C1810]/60 text-sm line-clamp-3 mb-6">
                        {{ $car->description ?? 'Описание уточняйте у менеджера' }}
                    </p>

                    <div class="mt-auto">
                        <div class="flex items-end justify-between mb-4">
                            <span class="text-[#2C1810]/40 text-xs uppercase font-bold">Цена выкупа</span>
                            <span class="text-2xl font-black text-[#C8963E]">
                                {{ number_format($car->price, 0, '.', ',') }} ₽
                            </span>
                        </div>
                        
                        <button class="w-full bg-[#2C1810] hover:bg-[#3E2723] text-white py-4 rounded-xl font-extrabold uppercase text-xs tracking-widest transition-all shadow-lg active:scale-95">
                            Узнать стоимость выкупа
                        </button>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Блог -->
    <section class="bg-[#2C1810] py-20 px-6">
        <div class="max-w-6xl mx-auto">
            <h2 class="text-4xl font-black text-white mb-12 text-center uppercase tracking-tighter">
                Экспертный блог <span class="text-[#C8963E]">AutoBlog</span>
            </h2>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @foreach($posts as $post)
                <article class="flex flex-col bg-[#3E2723] rounded-2xl overflow-hidden border border-white/5 transition-all hover:border-[#C8963E]/50 group">
                    <div class="relative h-52 overflow-hidden">
                        @if($post->image)
                            <img src="{{ Storage::url($post->image) }}" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110" alt="{{ $post->title }}">
                        @endif
                        <div class="absolute inset-0 bg-gradient-to-t from-[#3E2723] to-transparent opacity-60"></div>
                        <span class="absolute bottom-4 left-6 bg-[#0D7377] text-white text-[10px] font-black uppercase px-3 py-1 rounded-full">
                            {{ $post->category }}
                        </span>
                    </div>

                    <div class="p-8 flex flex-col flex-grow">
                        <h3 class="text-xl font-bold text-white leading-snug group-hover:text-[#C8963E] transition-colors">
                            {{ $post->title }}
                        </h3>
                        <p class="text-gray-400 mt-4 text-sm leading-relaxed line-clamp-3">
                            {{ strip_tags($post->content) }}
                        </p>
                        
                        <div class="mt-auto pt-6">
                            <a href="#" class="text-xs font-bold text-[#C8963E] uppercase tracking-widest flex items-center group-hover:translate-x-2 transition-transform">
                                Читать статью 
                                <svg class="w-4 h-4 ml-2 text-[#C8963E]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                            </a>
                        </div>
                    </div>
                </article>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Отзывы -->
    <section class="bg-[#F5EDE3] py-20 px-6">
        <div class="max-w-6xl mx-auto">
            <h2 class="text-4xl font-black text-[#2C1810] mb-4 text-center uppercase tracking-tighter">
                Реальные кейсы
            </h2>
            <p class="text-[#2C1810]/50 text-center mb-16 max-w-2xl mx-auto">Посмотрите, какую выгоду получили наши клиенты при продаже авто через аукцион по сравнению с обычным трейд-ин.</p>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @foreach($reviews as $review)
                <div class="bg-white p-10 rounded-3xl border border-[#C8963E]/10 relative flex flex-col shadow-2xl">
                    <div class="absolute -top-4 left-10 bg-[#0D7377] p-3 rounded-xl shadow-lg">
                        <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 24 24"><path d="M14.017 21L14.017 18C14.017 16.8954 14.9124 16 16.017 16H19.017C19.5693 16 20.017 15.5523 20.017 15V9C20.017 8.44772 19.5693 8 19.017 8H15.017C14.4647 8 14.017 8.44772 14.017 9V12C14.017 12.5523 13.5693 13 13.017 13H11.017C10.4647 13 10.017 12.5523 10.017 12V9C10.017 7.89543 10.9124 7 12.017 7H19.017C20.6739 7 22.017 8.34315 22.017 10V15C22.017 17.7614 19.7784 20 17.017 20H14.017V21ZM5.017 21L5.017 18C5.017 16.8954 5.91243 16 7.017 16H10.017C10.5693 16 11.017 15.5523 11.017 15V9C11.017 8.44772 10.5693 8 10.017 8H6.017C5.46472 8 5.017 8.44772 5.017 9V12C5.017 12.5523 4.5693 13 4.017 13H2.017C1.46472 13 1.017 12.5523 1.017 12V9C1.017 7.89543 1.91243 7 3.017 7H10.017C11.6739 7 13.017 8.34315 13.017 10V15C13.017 17.7614 10.7784 20 8.017 20H5.017V21Z"></path></svg>
                    </div>

                    <p class="text-[#2C1810]/70 italic leading-relaxed text-lg mb-8">
                        "{{ $review->text }}"
                    </p>

                    <div class="mt-auto border-t border-[#C8963E]/10 pt-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <div class="font-bold text-[#2C1810] text-lg">{{ $review->client_name }}</div>
                                <div class="text-xs text-[#2C1810]/40 uppercase tracking-widest mt-1">{{ $review->car_model }}</div>
                            </div>
                            <div class="text-right">
                                <div class="text-[10px] text-[#2C1810]/40 uppercase font-bold">Выгода</div>
                                <div class="text-[#0D7377] font-black text-xl">
                                    +{{ number_format($review->profit_amount, 0, '.', ' ') }} ₽
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Подвал -->
    <footer class="bg-[#2C1810] py-12 px-6">
        <div class="max-w-6xl mx-auto">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 text-white">
                <div>
                    <span class="text-xl font-extrabold">Avto<span class="text-[#C8963E]">Blog</span></span>
                    <p class="text-white/50 text-sm mt-2">Сервис продажи и обмена авто. Аукцион, трейд-ин и кредитование.</p>
                </div>
                <div>
                    <h3 class="font-bold mb-3">Навигация</h3>
                    <ul class="space-y-2 text-sm text-white/50">
                        <li><a href="/trade-in" class="hover:text-[#C8963E]">Trade‑In</a></li>
                        <li><a href="/credit" class="hover:text-[#C8963E]">Кредит</a></li>
                        <li><a href="/blog" class="hover:text-[#C8963E]">Блог</a></li>
                        <li><a href="/reviews" class="hover:text-[#C8963E]">Отзывы</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="font-bold mb-3">Контакты</h3>
                    <p class="text-[#C8963E] text-xl font-extrabold">8-800-123-45-67</p>
                    <p class="text-white/50 text-sm">offer@avtoblog.ru</p>
                    <div class="flex space-x-3 mt-3">
                        <a href="#" class="w-9 h-9 bg-[#0D7377] rounded-full flex items-center justify-center text-white text-xs font-bold">TG</a>
                        <a href="#" class="w-9 h-9 bg-[#0D7377] rounded-full flex items-center justify-center text-white text-xs font-bold">YT</a>
                        <a href="#" class="w-9 h-9 bg-[#0D7377] rounded-full flex items-center justify-center text-white text-xs font-bold">VK</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>

</body>
</html>
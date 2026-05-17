<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>АвтоБлог — Продажа и обмен авто</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
</head>
<body class="bg-[#1E1E1E] text-[#B0B0B0] font-['Inter'] antialiased">

    {{-- Шапка --}}
    <header class="bg-[#111] border-b border-gray-800 sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <a href="/" class="text-2xl font-bold text-white tracking-tight">
                    Avto<span class="text-[#C79A2C]">Blog</span>
                </a>
                <nav class="hidden lg:flex items-center space-x-6">
                    <a href="/sell" class="text-gray-300 hover:text-white transition-colors text-sm">Продать быстро</a>
                    <a href="/trade-in" class="text-gray-300 hover:text-[#1E90FF] transition-colors text-sm">Trade‑In</a>
                    <a href="/credit" class="text-gray-300 hover:text-[#1E90FF] transition-colors text-sm">Кредит</a>
                    <a href="/how-it-works" class="text-gray-300 hover:text-[#1E90FF] transition-colors text-sm">Как это работает</a>
                    <a href="/blog" class="text-gray-300 hover:text-[#1E90FF] transition-colors text-sm">Блог</a>
                    <a href="/reviews" class="text-gray-300 hover:text-[#1E90FF] transition-colors text-sm">Отзывы</a>
                </nav>
                <a href="/sell" class="hidden lg:inline-flex bg-[#C79A2C] hover:bg-[#D4AF37] text-black font-semibold px-5 py-2 rounded-lg text-sm transition-all shadow-lg shadow-[#C79A2C]/20">
                    Оценить авто
                </a>
            </div>
        </div>
    </header>

    {{-- Hero-секция --}}
    <section class="pt-20 pb-16 px-4">
        <div class="max-w-4xl mx-auto text-center">
            <h1 class="text-4xl md:text-6xl font-bold text-white leading-tight mb-6">
                Раскроем реальную стоимость<br>
                <span class="bg-gradient-to-r from-[#C79A2C] to-[#D4AF37] bg-clip-text text-transparent">вашего автомобиля</span>
            </h1>
            <p class="text-lg text-gray-400 mb-8 max-w-2xl mx-auto">
                Продайте или обменяйте за 1 день. AvtoBlog организует закрытый онлайн-аукцион среди тысяч байеров.
            </p>
            <div class="bg-[#2C2C2C] border border-gray-700 rounded-2xl p-6 max-w-xl mx-auto shadow-xl">
                <div class="flex flex-col sm:flex-row gap-3">
                    <input
                        type="text"
                        placeholder="Введите госномер, например А123БВ177"
                        class="flex-1 bg-[#1E1E1E] border border-gray-600 rounded-lg px-4 py-3 text-white placeholder-gray-500 focus:outline-none focus:border-[#C79A2C] transition-colors"
                    >
                    <button class="bg-[#C79A2C] hover:bg-[#D4AF37] text-black font-semibold px-6 py-3 rounded-lg transition-all whitespace-nowrap shadow-lg">
                        Узнать цену
                    </button>
                </div>
            </div>
        </div>
    </section>

    {{-- Карточки автомобилей --}}
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pb-20">
        <h2 class="text-3xl font-bold text-white mb-10">Наши автомобили</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @foreach($cars as $car)
                <div class="flex flex-col bg-[#2C2C2C] rounded-2xl shadow-xl overflow-hidden border border-gray-700 hover:border-[#C79A2C]/50 transition-all duration-300 hover:-translate-y-1">
                    
                    <div class="relative h-56 w-full bg-gray-700">
                        @if($car->image)
                            <img src="{{ Storage::url($car->image) }}" class="w-full h-full object-cover" alt="{{ $car->model }}">
                        @else
                            <div class="flex items-center justify-center h-full text-gray-500">Нет фото</div>
                        @endif
                        
                        <div class="absolute top-3 right-3 px-3 py-1 rounded-full text-[10px] uppercase font-black tracking-wider shadow-md 
                            {{ $car->status === 'available' ? 'bg-[#1E90FF]' : 'bg-red-500' }} text-white">
                            {{ $car->status === 'available' ? 'В наличии' : 'Продано' }}
                        </div>
                    </div>

                    <div class="p-6 flex flex-col flex-grow">
                        <div class="mb-4">
                            <h2 class="text-xl font-bold text-white leading-tight">
                                {{ $car->brand }} {{ $car->model }}
                            </h2>
                            <p class="text-gray-400 text-sm font-medium">{{ $car->year }} года выпуска</p>
                        </div>

                        <p class="text-gray-400 text-sm line-clamp-3 mb-6">
                            {{ $car->description ?? 'Описание уточняйте у менеджера' }}
                        </p>

                        <div class="mt-auto">
                            <div class="flex items-end justify-between mb-4">
                                <span class="text-gray-500 text-xs uppercase font-bold">Цена выкупа</span>
                                <span class="text-2xl font-black text-[#C79A2C]">
                                    {{ number_format($car->price, 0, '.', ',') }} ₽
                                </span>
                            </div>
                            
                            <button class="w-full bg-[#C79A2C] hover:bg-[#D4AF37] text-black font-extrabold py-4 rounded-xl uppercase text-xs tracking-widest transition-all shadow-lg active:scale-95">
                                Узнать стоимость выкупа
                            </button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    {{-- Блог --}}
    <section class="bg-[#1A1A1A] py-20 px-6">
        <div class="max-w-6xl mx-auto">
            <h2 class="text-4xl font-black text-white mb-12 text-center uppercase tracking-tighter">
                Экспертный блог <span class="text-[#C79A2C]">AutoBlog</span>
            </h2>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @foreach($posts as $post)
                <article class="flex flex-col bg-[#262626] rounded-2xl overflow-hidden border border-white/5 transition-all duration-300 hover:border-[#1E90FF]/50 hover:-translate-y-1 group">
                    <div class="relative h-52 overflow-hidden">
                        @if($post->image)
                            <img src="{{ Storage::url($post->image) }}" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110" alt="{{ $post->title }}">
                        @else
                            <div class="w-full h-full bg-gray-700 flex items-center justify-center text-gray-500">Нет фото</div>
                        @endif
                        <div class="absolute inset-0 bg-gradient-to-t from-[#262626] to-transparent opacity-60"></div>
                        <span class="absolute bottom-4 left-6 bg-[#1E90FF] text-white text-[10px] font-black uppercase px-3 py-1 rounded-full">
                            {{ $post->category ?? 'Статья' }}
                        </span>
                    </div>

                    <div class="p-8 flex flex-col flex-grow">
                        <h3 class="text-xl font-bold text-white leading-snug group-hover:text-[#C79A2C] transition-colors">
                            {{ $post->title }}
                        </h3>
                        <p class="text-gray-400 mt-4 text-sm leading-relaxed line-clamp-3">
                            {{ strip_tags($post->content) }}
                        </p>
                        
                        <div class="mt-auto pt-6">
                            <a href="#" class="text-xs font-bold text-[#1E90FF] uppercase tracking-widest flex items-center group-hover:translate-x-2 transition-transform">
                                Читать статью 
                                <svg class="w-4 h-4 ml-2 text-[#C79A2C]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                            </a>
                        </div>
                    </div>
                </article>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Отзывы --}}
    <section class="bg-[#121212] py-20 px-6">
        <div class="max-w-6xl mx-auto">
            <h2 class="text-4xl font-black text-white mb-4 text-center uppercase tracking-tighter">
                Реальные кейсы
            </h2>
            <p class="text-gray-500 text-center mb-16 max-w-2xl mx-auto">Посмотрите, какую выгоду получили наши клиенты при продаже авто через аукцион по сравнению с обычным трейд-ин.</p>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @foreach($reviews as $review)
                <div class="bg-[#1E1E1E] p-10 rounded-3xl border border-gray-700 relative flex flex-col shadow-2xl transition-all duration-300 hover:border-[#C79A2C]/50 hover:-translate-y-1">
                    <div class="absolute -top-4 left-10 bg-[#C79A2C] p-3 rounded-xl shadow-lg">
                        <svg class="w-5 h-5 text-black" fill="currentColor" viewBox="0 0 24 24"><path d="M14.017 21V18c0-1.1046.8954-2 2-2h3c.5523 0 1-.4477 1-1V9c0-.5523-.4477-1-1-1h-4c-.5523 0-1-.4477-1-1v3c0 .5523-.4477 1-1 1h-2c-.5523 0-1-.4477-1-1V9c0-1.1046.8954-2 2-2h7c1.6569 0 3 1.3431 3 3v5c0 2.7614-2.2386 5-5 5h-3v1zM5.017 21V18c0-1.1046.89543-2 2-2h3c.5523 0 1-.4477 1-1V9c0-.5523-.4477-1-1-1H6.017c-.55228 0-1-.4477-1-1v3c0 .5523-.44772 1-1 1h-2c-.55228 0-1-.4477-1-1V9c0-1.1046.89543-2 2-2h7c1.6569 0 3 1.3431 3 3v5c0 2.7614-2.2386 5-5 5h-3v1z"/></svg>
                    </div>

                    <p class="text-gray-300 italic leading-relaxed text-lg mb-8">
                        "{{ $review->text }}"
                    </p>

                    <div class="mt-auto border-t border-gray-700 pt-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <div class="font-bold text-white text-lg">{{ $review->client_name }}</div>
                                <div class="text-xs text-gray-500 uppercase tracking-widest mt-1">{{ $review->car_model }}</div>
                            </div>
                            <div class="text-right">
                                <div class="text-[10px] text-gray-500 uppercase font-bold">Выгода</div>
                                <div class="text-[#C79A2C] font-black text-xl">
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

    {{-- Подвал --}}
    <footer class="bg-[#111] border-t border-gray-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
                <div>
                    <span class="text-xl font-bold text-white">Avto<span class="text-[#C79A2C]">Blog</span></span>
                    <p class="mt-3 text-gray-400 text-sm leading-relaxed">
                        Прозрачный сервис продажи и обмена автомобилей. Аукцион, трейд-ин и кредитование в одном месте.
                    </p>
                    <p class="mt-6 text-xs text-gray-500">&copy; {{ date('Y') }} AvtoBlog. Все права защищены.</p>
                </div>
                <div>
                    <h3 class="text-white font-semibold mb-4">Навигация</h3>
                    <ul class="space-y-2 text-sm text-gray-400">
                        <li><a href="/sell" class="hover:text-[#C79A2C] transition-colors">Продать быстро</a></li>
                        <li><a href="/trade-in" class="hover:text-[#C79A2C] transition-colors">Trade‑In</a></li>
                        <li><a href="/credit" class="hover:text-[#C79A2C] transition-colors">Автокредитование</a></li>
                        <li><a href="/blog" class="hover:text-[#C79A2C] transition-colors">Блог</a></li>
                        <li><a href="/reviews" class="hover:text-[#C79A2C] transition-colors">Отзывы</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-white font-semibold mb-4">Контакты и соцсети</h3>
                    <p class="text-[#C79A2C] text-lg font-semibold mb-3">8-800-123-45-67</p>
                    <div class="flex items-center space-x-3 mb-4">
                        <a href="https://t.me/avtoblog" target="_blank" rel="noopener noreferrer" class="w-9 h-9 bg-[#1E90FF] rounded-full flex items-center justify-center hover:scale-110 transition-transform">
                            <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 24 24"><path d="M12 0C5.373 0 0 5.373 0 12s5.373 12 12 12 12-5.373 12-12S18.627 0 12 0zm5.894 8.221l-1.97 9.28c-.145.658-.537.818-1.084.508l-3-2.21-1.446 1.394c-.14.18-.305.332-.605.332l.213-3.045 5.56-5.023c.242-.213-.054-.334-.373-.121l-6.87 4.326-2.96-.924c-.643-.203-.658-.643.136-.953l11.566-4.458c.538-.196 1.006.128.832.894z"/></svg>
                        </a>
                        <a href="https://youtube.com/@avtoblog" target="_blank" rel="noopener noreferrer" class="w-9 h-9 bg-[#1E90FF] rounded-full flex items-center justify-center hover:scale-110 transition-transform">
                            <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 24 24"><path d="M23.498 6.186a3.016 3.016 0 00-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 00.502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 002.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 002.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/></svg>
                        </a>
                        <a href="https://vk.com/avtoblog" target="_blank" rel="noopener noreferrer" class="w-9 h-9 bg-[#1E90FF] rounded-full flex items-center justify-center hover:scale-110 transition-transform">
                            <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 24 24"><path d="M15.684 0H8.316C3.724 0 0 3.724 0 8.316v7.368C0 20.276 3.724 24 8.316 24h7.368C20.276 24 24 20.276 24 15.684V8.316C24 3.724 20.276 0 15.684 0zm3.692 15.684h-1.988c-.66 0-.864-.524-2.052-1.706-1.034-1.006-1.494-1.136-1.748-1.136-.356 0-.456.102-.456.596v1.544c0 .428-.136.68-1.256.68-1.852 0-3.9-1.126-5.344-3.22-1.444-2.094-1.808-4.834-1.808-5.038 0-.256.102-.596.596-.596h1.988c.44 0 .61.204.78.68.864 2.48 2.32 4.64 2.916 4.64.22 0 .322-.102.322-.68V9.16c-.068-1.156-.648-1.254-.648-1.666 0-.204.17-.374.44-.374h3.128c.374 0 .51.204.51.646v3.484c0 .374.17.51.272.51.22 0 .408-.136.816-.578 1.258-1.412 2.154-3.586 2.154-3.586.118-.272.34-.68.782-.68h1.988c.374 0 .476.204.374.646-.154.714-3.246 5.556-3.246 5.556-.272.442-.374.646 0 1.156.272.444 1.156 1.138 1.734 1.836.578.68.714 1.02.612 1.36-.102.306-.476.34-.884.34z"/></svg>
                        </a>
                    </div>
                    <p class="text-sm text-gray-500">offer@avtoblog.ru</p>
                </div>
            </div>
        </div>
    </footer>

</body>
</html>
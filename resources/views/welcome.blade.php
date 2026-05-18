<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>АвтоБлог — Продажа и обмен авто</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
</head>
<body class="bg-[#FBF7F0] text-[#3E2723] font-['Manrope'] antialiased">

    {{-- Шапка --}}
    <header class="bg-[#2C1810]/95 backdrop-blur-md border-b border-[#C8963E]/20 sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-18">
                <a href="/" class="text-2xl font-extrabold tracking-tight">
                    <span class="text-[#FBF7F0]">Avto</span><span class="text-[#C8963E]">Blog</span>
                </a>
                <nav class="hidden lg:flex items-center space-x-8">
                    <a href="#" class="text-[#FBF7F0]/80 hover:text-[#C8963E] transition-colors text-sm font-medium">Продать быстро</a>
                    <a href="#" class="text-[#FBF7F0]/80 hover:text-[#C8963E] transition-colors text-sm font-medium">Trade-In</a>
                    <a href="#" class="text-[#FBF7F0]/80 hover:text-[#C8963E] transition-colors text-sm font-medium">Кредит</a>
                    <a href="#" class="text-[#FBF7F0]/80 hover:text-[#C8963E] transition-colors text-sm font-medium">Блог</a>
                    <a href="#" class="text-[#FBF7F0]/80 hover:text-[#C8963E] transition-colors text-sm font-medium">Отзывы</a>
                </nav>
                <a href="#" class="hidden lg:inline-flex bg-[#C8963E] hover:bg-[#D4A84B] text-white font-bold px-6 py-3 rounded-full text-sm transition-all shadow-lg shadow-[#C8963E]/20 hover:shadow-[#C8963E]/40">
                    Оценить авто
                </a>
            </div>
        </div>
    </header>

    {{-- Hero --}}
    <section class="relative pt-28 pb-20 px-4 overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-b from-[#2C1810]/5 to-transparent pointer-events-none"></div>
        <div class="max-w-4xl mx-auto text-center relative z-10">
            <div class="inline-flex items-center px-4 py-1.5 rounded-full bg-[#0D7377]/10 text-[#0D7377] text-xs font-bold uppercase tracking-widest mb-6">
                Онлайн-аукцион для продажи авто
            </div>
            <h1 class="text-5xl md:text-7xl font-extrabold text-[#2C1810] leading-none mb-6">
                Продайте авто<br>
                <span class="text-[#C8963E]">за 2 часа</span> без перекупов
            </h1>
            <p class="text-lg text-[#3E2723]/60 mb-10 max-w-xl mx-auto leading-relaxed">
                Тысячи дилеров торгуются за вашу машину онлайн. Вы просто смотрите и выбираете лучшую цену.
            </p>
            <div class="flex flex-col sm:flex-row gap-3 justify-center max-w-md mx-auto">
                <input
                    type="text"
                    placeholder="Госномер, например А123БВ177"
                    class="flex-1 bg-white border border-[#C8963E]/20 rounded-full px-6 py-4 text-[#2C1810] placeholder-[#3E2723]/40 focus:outline-none focus:border-[#C8963E] focus:ring-4 focus:ring-[#C8963E]/10 transition-all shadow-sm"
                >
                <button class="bg-[#C8963E] hover:bg-[#B8860B] text-white font-bold px-8 py-4 rounded-full transition-all shadow-lg shadow-[#C8963E]/25 hover:shadow-xl whitespace-nowrap">
                    Узнать цену
                </button>
            </div>
            <div class="flex items-center justify-center mt-4 space-x-4 text-xs text-[#3E2723]/40">
                <span>Яндекс</span>
                <span>Сбер</span>
                <span>Альфа</span>
                <span>Т-Банк</span>
            </div>
        </div>
    </section>

    {{-- Карточки автомобилей --}}
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pb-24">
        <div class="flex items-end justify-between mb-10">
            <div>
                <p class="text-[#0D7377] text-xs font-bold uppercase tracking-widest mb-2">Каталог</p>
                <h2 class="text-4xl font-extrabold text-[#2C1810]">Наши автомобили</h2>
            </div>
            <a href="#" class="hidden sm:inline-flex items-center text-[#0D7377] font-semibold text-sm hover:underline">
                Смотреть все &rarr;
            </a>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @foreach($cars as $car)
                <div class="group flex flex-col bg-white rounded-3xl shadow-md overflow-hidden border border-[#C8963E]/10 transition-all duration-500 hover:shadow-xl hover:shadow-[#C8963E]/10 hover:-translate-y-1">
                    
                    <div class="relative h-56 w-full bg-[#F5EDE3] overflow-hidden">
                        @if($car->image)
                            <img src="{{ Storage::url($car->image) }}" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105" alt="{{ $car->model }}">
                        @else
                            <div class="flex items-center justify-center h-full text-[#C8963E]/30">
                                <svg class="w-16 h-16" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z"/></svg>
                            </div>
                        @endif
                        
                        <div class="absolute top-4 right-4 px-3 py-1.5 rounded-full text-[10px] font-extrabold uppercase tracking-wider
                            {{ $car->status === 'available' ? 'bg-[#0D7377]' : 'bg-[#C8963E]/80' }} text-white shadow-lg">
                            {{ $car->status === 'available' ? 'В наличии' : 'Продано' }}
                        </div>
                    </div>

                    <div class="p-6 flex flex-col flex-grow">
                        <div class="mb-2">
                            <h3 class="text-xl font-bold text-[#2C1810] leading-tight">
                                {{ $car->brand }} {{ $car->model }}
                            </h3>
                            <p class="text-[#3E2723]/50 text-sm font-medium">{{ $car->year }} г.</p>
                        </div>

                        <p class="text-[#3E2723]/60 text-sm line-clamp-2 mb-6 leading-relaxed">
                            {{ $car->description ?? 'Описание уточняйте у менеджера' }}
                        </p>

                        <div class="mt-auto pt-4 border-t border-[#C8963E]/10">
                            <div class="flex items-end justify-between mb-4">
                                <span class="text-[#3E2723]/40 text-xs uppercase font-bold">Цена выкупа</span>
                                <span class="text-2xl font-extrabold text-[#C8963E]">
                                    {{ number_format($car->price, 0, '.', ',') }} ₽
                                </span>
                            </div>
                            
                            <button class="w-full bg-[#2C1810] hover:bg-[#3E2723] text-white font-bold py-4 rounded-2xl uppercase text-xs tracking-wider transition-all shadow-lg active:scale-[0.98]">
                                Узнать стоимость
                            </button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    {{-- Блог --}}
    <section class="bg-[#2C1810] py-24 px-6 relative overflow-hidden">
        <div class="absolute top-0 right-0 w-96 h-96 bg-[#C8963E]/5 rounded-full blur-3xl pointer-events-none"></div>
        <div class="absolute bottom-0 left-0 w-96 h-96 bg-[#0D7377]/5 rounded-full blur-3xl pointer-events-none"></div>
        <div class="max-w-6xl mx-auto relative z-10">
            <div class="text-center mb-16">
                <p class="text-[#C8963E] text-xs font-bold uppercase tracking-widest mb-3">Блог</p>
                <h2 class="text-5xl font-extrabold text-[#FBF7F0] leading-tight">
                    Экспертный взгляд<br><span class="text-[#C8963E]">AutoBlog</span>
                </h2>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @foreach($posts as $post)
                <article class="group flex flex-col bg-[#3E2723] rounded-3xl overflow-hidden border border-[#C8963E]/10 transition-all duration-500 hover:border-[#C8963E]/40 hover:-translate-y-1">
                    <div class="relative h-52 overflow-hidden">
                        @if($post->image)
                            <img src="{{ Storage::url($post->image) }}" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110" alt="{{ $post->title }}">
                        @else
                            <div class="w-full h-full bg-[#2C1810] flex items-center justify-center text-[#C8963E]/20">
                                <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/></svg>
                            </div>
                        @endif
                        <span class="absolute bottom-4 left-6 bg-[#0D7377] text-white text-[10px] font-extrabold uppercase px-3 py-1.5 rounded-full tracking-wider">
                            {{ $post->category ?? 'Статья' }}
                        </span>
                    </div>

                    <div class="p-8 flex flex-col flex-grow">
                        <h3 class="text-xl font-bold text-[#FBF7F0] leading-snug group-hover:text-[#C8963E] transition-colors">
                            {{ $post->title }}
                        </h3>
                        <p class="text-[#FBF7F0]/50 mt-4 text-sm leading-relaxed line-clamp-3">
                            {{ strip_tags($post->content) }}
                        </p>
                        
                        <div class="mt-auto pt-6">
                            <a href="#" class="inline-flex items-center text-sm font-bold text-[#C8963E] uppercase tracking-wider group-hover:translate-x-2 transition-transform">
                                Читать
                                <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                            </a>
                        </div>
                    </div>
                </article>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Отзывы --}}
    <section class="bg-[#F5EDE3] py-24 px-6">
        <div class="max-w-6xl mx-auto">
            <div class="text-center mb-16">
                <p class="text-[#0D7377] text-xs font-bold uppercase tracking-widest mb-3">Кейсы</p>
                <h2 class="text-5xl font-extrabold text-[#2C1810] leading-tight">
                    Реальные истории<br><span class="text-[#C8963E]">наших клиентов</span>
                </h2>
                <p class="text-[#3E2723]/50 mt-4 max-w-xl mx-auto">Выгода по сравнению с обычным трейд-ин</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @foreach($reviews as $review)
                <div class="bg-white p-8 rounded-3xl border border-[#C8963E]/10 relative flex flex-col shadow-lg transition-all duration-500 hover:shadow-xl hover:shadow-[#C8963E]/10 hover:-translate-y-1">
                    <div class="absolute -top-5 left-8 w-12 h-12 bg-[#0D7377] rounded-2xl flex items-center justify-center shadow-lg rotate-3">
                        <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 24 24"><path d="M14.017 21v-3c0-1.105.895-2 2-2h3c.552 0 1-.448 1-1V9c0-.552-.448-1-1-1h-4c-.552 0-1-.448-1-1v3c0 .552-.448 1-1 1h-2c-.552 0-1-.448-1-1V9c0-1.105.895-2 2-2h7c1.657 0 3 1.343 3 3v5c0 2.761-2.239 5-5 5h-3v1zm-9 0v-3c0-1.105.895-2 2-2h3c.552 0 1-.448 1-1V9c0-.552-.448-1-1-1H6c-.552 0-1-.448-1-1v3c0 .552-.448 1-1 1H2c-.552 0-1-.448-1-1V9c0-1.105.895-2 2-2h7c1.657 0 3 1.343 3 3v5c0 2.761-2.239 5-5 5H5v1z"/></svg>
                    </div>

                    <p class="text-[#3E2723]/70 italic leading-relaxed text-lg mt-4 mb-6">
                        "{{ $review->text }}"
                    </p>

                    <div class="mt-auto border-t border-[#C8963E]/10 pt-5">
                        <div class="flex items-center justify-between">
                            <div>
                                <div class="font-bold text-[#2C1810] text-lg">{{ $review->client_name }}</div>
                                <div class="text-xs text-[#3E2723]/50 uppercase tracking-widest mt-0.5">{{ $review->car_model }}</div>
                            </div>
                            <div class="text-right">
                                <div class="text-[10px] text-[#3E2723]/40 uppercase font-bold">Выгода</div>
                                <div class="text-[#0D7377] font-extrabold text-xl">
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
    <footer class="bg-[#2C1810] border-t border-[#C8963E]/10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
                <div>
                    <span class="text-2xl font-extrabold text-[#FBF7F0]">Avto<span class="text-[#C8963E]">Blog</span></span>
                    <p class="mt-4 text-[#FBF7F0]/50 text-sm leading-relaxed max-w-xs">
                        Прозрачный сервис продажи и обмена авто. Аукцион, трейд-ин и кредитование в одном месте.
                    </p>
                    <p class="mt-6 text-xs text-[#FBF7F0]/30">&copy; {{ date('Y') }} AvtoBlog.</p>
                </div>
                <div>
                    <h3 class="text-[#FBF7F0] font-bold mb-4">Навигация</h3>
                    <ul class="space-y-2.5 text-sm text-[#FBF7F0]/50">
                        <li><a href="#" class="hover:text-[#C8963E] transition-colors">Продать быстро</a></li>
                        <li><a href="#" class="hover:text-[#C8963E] transition-colors">Trade‑In</a></li>
                        <li><a href="#" class="hover:text-[#C8963E] transition-colors">Автокредитование</a></li>
                        <li><a href="#" class="hover:text-[#C8963E] transition-colors">Блог</a></li>
                        <li><a href="#" class="hover:text-[#C8963E] transition-colors">Отзывы</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-[#FBF7F0] font-bold mb-4">Контакты</h3>
                    <p class="text-[#C8963E] text-xl font-extrabold mb-4">8-800-123-45-67</p>
                    <div class="flex items-center space-x-3 mb-4">
                        <a href="https://t.me/avtoblog" target="_blank" rel="noopener noreferrer" class="w-10 h-10 bg-[#0D7377] rounded-full flex items-center justify-center hover:scale-110 transition-transform">
                            <span class="text-white text-sm font-bold">TG</span>
                        </a>
                        <a href="https://youtube.com/@avtoblog" target="_blank" rel="noopener noreferrer" class="w-10 h-10 bg-[#0D7377] rounded-full flex items-center justify-center hover:scale-110 transition-transform">
                            <span class="text-white text-sm font-bold">YT</span>
                        </a>
                        <a href="https://vk.com/avtoblog" target="_blank" rel="noopener noreferrer" class="w-10 h-10 bg-[#0D7377] rounded-full flex items-center justify-center hover:scale-110 transition-transform">
                            <span class="text-white text-sm font-bold">VK</span>
                        </a>
                    </div>
                    <p class="text-sm text-[#FBF7F0]/50">offer@avtoblog.ru</p>
                </div>
            </div>
        </div>
    </footer>

</body>
</html>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>АвтоБлог</title>
    <script src="https://cdn.tailwindcss.com"></script> </head>
<body class="bg-gray-100 p-8">
    <h1 class="text-3xl font-bold mb-8">Наши автомобили/=</h1>

  <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
    @foreach($cars as $car)
        <div class="flex flex-col bg-white rounded-xl shadow-lg overflow-hidden border border-gray-100 transition-transform hover:scale-[1.02]">
            
            <div class="relative h-56 w-full bg-gray-200">
                @if($car->image)
                    <img src="{{ Storage::url($car->image) }}" class="w-full h-full object-cover" alt="{{ $car->model }}">
                @else
                    <div class="flex items-center justify-center h-full text-gray-400">Нет фото</div>
                @endif
                
                <div class="absolute top-3 right-3 px-3 py-1 rounded-full text-[10px] uppercase font-black tracking-wider shadow-md 
                    {{ $car->status === 'available' ? 'bg-green-500' : 'bg-red-500' }} text-white">
                    {{ $car->status === 'available' ? 'В наличии' : 'Продано' }}
                </div>
            </div>

            <div class="p-6 flex flex-col flex-grow">
                <div class="mb-4">
                    <h2 class="text-xl font-bold text-gray-900 leading-tight">
                        {{ $car->brand }} {{ $car->model }}
                    </h2>
                    <p class="text-gray-400 text-sm font-medium">{{ $car->year }} года выпуска</p>
                </div>

                <p class="text-gray-600 text-sm line-clamp-3 mb-6">
                    {{ $car->description ?? 'Описание уточняйте у менеджера' }}
                </p>

                <div class="mt-auto">
                    <div class="flex items-end justify-between mb-4">
                        <span class="text-gray-400 text-xs uppercase font-bold">Цена выкупа</span>
                        <span class="text-2xl font-black text-[#C79A2C]">
                            ${{ number_format($car->price, 0, '.', ',') }}
                        </span>
                    </div>
                    
                    <button class="w-full bg-[#C79A2C] hover:bg-[#A88224] text-white py-4 rounded-xl font-extrabold uppercase text-xs tracking-widest transition-all shadow-lg active:scale-95">
                        Узнать стоимость выкупа
                    </button>
                </div>
            </div>
        </div>
    @endforeach
</div>
<section class="bg-[#1E1E1E] py-20 px-6">
    <div class="max-w-6xl mx-auto">
        <h2 class="text-4xl font-black text-white mb-12 text-center uppercase tracking-tighter">
            Экспертный блог <span class="text-[#C79A2C]">AutoBlog</span>
        </h2>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @foreach($posts as $post)
            <article class="flex flex-col bg-[#262626] rounded-2xl overflow-hidden border border-white/5 transition-all hover:border-[#C79A2C]/50 group">
                <div class="relative h-52 overflow-hidden">
                    @if($post->image)
                        <img src="{{ Storage::url($post->image) }}" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110" alt="{{ $post->title }}">
                    @endif
                    <div class="absolute inset-0 bg-gradient-to-t from-[#262626] to-transparent opacity-60"></div>
                    <span class="absolute bottom-4 left-6 bg-[#C79A2C] text-black text-[10px] font-black uppercase px-3 py-1 rounded-full">
                        {{ $post->category }}
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
                        <a href="#" class="text-xs font-bold text-white uppercase tracking-widest flex items-center group-hover:translate-x-2 transition-transform">
                            Читать статью 
                            <svg class="w-4 h-4 ml-2 text-[#C79A2C]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="Return 17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                        </a>
                    </div>
                </div>
            </article>
            @endforeach
        </div>
    </div>
</section>
<section class="bg-[#121212] py-20 px-6">
    <div class="max-w-6xl mx-auto">
        <h2 class="text-4xl font-black text-white mb-4 text-center uppercase tracking-tighter">
            Реальные кейсы
        </h2>
        <p class="text-gray-500 text-center mb-16 max-w-2xl mx-auto">Посмотрите, какую выгоду получили наши клиенты при продаже авто через аукцион по сравнению с обычным трейд-ин.</p>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @foreach($reviews as $review)
            <div class="bg-[#1E1E1E] p-10 rounded-3xl border border-white/5 relative flex flex-col shadow-2xl">
                <div class="absolute -top-4 left-10 bg-[#C79A2C] p-3 rounded-xl shadow-lg">
                    <svg class="w-5 h-5 text-black" fill="currentColor" viewBox="0 0 24 24"><path d="M14.017 21L14.017 18C14.017 16.8954 14.9124 16 16.017 16H19.017C19.5693 16 20.017 15.5523 20.017 15V9C20.017 8.44772 19.5693 8 19.017 8H15.017C14.4647 8 14.017 8.44772 14.017 9V12C14.017 12.5523 13.5693 13 13.017 13H11.017C10.4647 13 10.017 12.5523 10.017 12V9C10.017 7.89543 10.9124 7 12.017 7H19.017C20.6739 7 22.017 8.34315 22.017 10V15C22.017 17.7614 19.7784 20 17.017 20H14.017V21ZM5.017 21L5.017 18C5.017 16.8954 5.91243 16 7.017 16H10.017C10.5693 16 11.017 15.5523 11.017 15V9C11.017 8.44772 10.5693 8 10.017 8H6.017C5.46472 8 5.017 8.44772 5.017 9V12C5.017 12.5523 4.5693 13 4.017 13H2.017C1.46472 13 1.017 12.5523 1.017 12V9C1.017 7.89543 1.91243 7 3.017 7H10.017C11.6739 7 13.017 8.34315 13.017 10V15C13.017 17.7614 10.7784 20 8.017 20H5.017V21Z"></path></svg>
                </div>

                <p class="text-gray-300 italic leading-relaxed text-lg mb-8">
                    "{{ $review->text }}"
                </p>

                <div class="mt-auto border-t border-white/5 pt-6">
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
</body>
</html>
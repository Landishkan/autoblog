<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Trade-In — АвтоБлог</title>
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
                    <a href="/trade-in" class="text-[#C8963E] transition-colors text-sm font-bold">Trade‑In</a>
                    <a href="#" class="text-white/70 hover:text-[#C8963E] transition-colors text-sm font-medium">Кредит</a>
                    <a href="#" class="text-white/70 hover:text-[#C8963E] transition-colors text-sm font-medium">Блог</a>
                    <a href="#" class="text-white/70 hover:text-[#C8963E] transition-colors text-sm font-medium">Отзывы</a>
                </nav>
                <a href="#" class="hidden lg:inline-flex bg-[#C8963E] hover:bg-[#B8860B] text-white font-bold px-5 py-2 rounded-lg text-sm transition-all">
                    Оценить авто
                </a>
            </div>
        </div>
    </header>

    <!-- Hero: Trade-In -->
    <section class="py-20 px-6">
        <div class="max-w-4xl mx-auto text-center">
            <div class="inline-flex items-center px-4 py-1.5 rounded-full bg-[#0D7377]/10 text-[#0D7377] text-xs font-bold uppercase tracking-widest mb-6">
                Обмен автомобиля с доплатой
            </div>
            <h1 class="text-5xl md:text-7xl font-extrabold text-[#2C1810] leading-none mb-6">
                Выгодный <span class="text-[#C8963E]">Trade-In</span><br>в AutoBlog
            </h1>
            <p class="text-lg text-[#2C1810]/60 mb-12 max-w-2xl mx-auto leading-relaxed">
                Обменяйте свой автомобиль на новый или с пробегом. Оценка по верхней планке рынка, сделка за 2 часа.
            </p>

            <!-- Калькулятор -->
            <div class="bg-white rounded-3xl shadow-xl border border-[#C8963E]/10 p-8 max-w-2xl mx-auto">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="text-left">
                        <label class="text-xs font-bold text-[#2C1810]/50 uppercase tracking-wider">Ваше авто</label>
                        <input
                            type="text"
                            placeholder="Марка и модель"
                            class="w-full bg-[#FBF7F0] border border-[#C8963E]/20 rounded-xl px-4 py-3 mt-2 text-[#2C1810] focus:outline-none focus:border-[#C8963E] transition-all"
                        >
                        <input
                            type="text"
                            placeholder="Год выпуска"
                            class="w-full bg-[#FBF7F0] border border-[#C8963E]/20 rounded-xl px-4 py-3 mt-2 text-[#2C1810] focus:outline-none focus:border-[#C8963E] transition-all"
                        >
                    </div>
                    <div class="text-left">
                        <label class="text-xs font-bold text-[#2C1810]/50 uppercase tracking-wider">Желаемое авто</label>
                        <input
                            type="text"
                            placeholder="Марка и модель"
                            class="w-full bg-[#FBF7F0] border border-[#C8963E]/20 rounded-xl px-4 py-3 mt-2 text-[#2C1810] focus:outline-none focus:border-[#C8963E] transition-all"
                        >
                        <input
                            type="text"
                            placeholder="Год выпуска"
                            class="w-full bg-[#FBF7F0] border border-[#C8963E]/20 rounded-xl px-4 py-3 mt-2 text-[#2C1810] focus:outline-none focus:border-[#C8963E] transition-all"
                        >
                    </div>
                </div>

                <div class="flex items-center justify-center my-6">
                    <div class="w-12 h-12 bg-[#0D7377] rounded-full flex items-center justify-center">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"/></svg>
                    </div>
                </div>

                <button class="w-full bg-[#C8963E] hover:bg-[#B8860B] text-white font-bold py-4 rounded-xl transition-all shadow-lg shadow-[#C8963E]/25 hover:shadow-xl text-lg">
                    Рассчитать доплату
                </button>
                <p class="text-xs text-[#2C1810]/40 mt-3">Ваша выгода: экономия времени и до 50 000 ₽ налогового вычета</p>
            </div>
        </div>
    </section>

    <!-- 5 причин -->
   <!-- Почему Trade-In в AutoBlog -->
<section class="py-20 px-6 bg-[#F5EDE3]">
    <div class="max-w-6xl mx-auto">
        <h2 class="text-4xl font-extrabold text-[#2C1810] text-center mb-4">
            Почему <span class="text-[#C8963E]">Trade-In</span> у нас?
        </h2>
        <p class="text-[#2C1810]/50 text-center mb-14 max-w-xl mx-auto">
            Без скрытых платежей, смутных схем и потерянного времени
        </p>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5">
            
            <!-- 1 -->
            <div class="bg-white rounded-2xl p-6 flex gap-4 items-start border border-[#C8963E]/10 hover:border-[#C8963E]/30 transition-all">
                <div class="w-10 h-10 bg-[#C8963E]/10 rounded-xl flex items-center justify-center flex-shrink-0 mt-0.5">
                    <span class="text-xl">💰</span>
                </div>
                <div>
                    <h3 class="font-bold text-[#2C1810] mb-1">Оценим дороже, чем в салоне</h3>
                    <p class="text-[#2C1810]/50 text-sm leading-relaxed">Вашу машину смотрят сразу тысячи дилеров. Конкуренция поднимает цену — в среднем на 10% выше трейд-ин в обычном автосалоне.</p>
                </div>
            </div>

            <!-- 2 -->
            <div class="bg-white rounded-2xl p-6 flex gap-4 items-start border border-[#C8963E]/10 hover:border-[#C8963E]/30 transition-all">
                <div class="w-10 h-10 bg-[#0D7377]/10 rounded-xl flex items-center justify-center flex-shrink-0 mt-0.5">
                    <span class="text-xl">⏱️</span>
                </div>
                <div>
                    <h3 class="font-bold text-[#2C1810] mb-1">2 часа — и вы на новом авто</h3>
                    <p class="text-[#2C1810]/50 text-sm leading-relaxed">Приехали, сдали старую машину, подписали документы, уехали на новой. Без ожиданий и очередей.</p>
                </div>
            </div>

            <!-- 3 -->
            <div class="bg-white rounded-2xl p-6 flex gap-4 items-start border border-[#C8963E]/10 hover:border-[#C8963E]/30 transition-all">
                <div class="w-10 h-10 bg-[#C8963E]/10 rounded-xl flex items-center justify-center flex-shrink-0 mt-0.5">
                    <span class="text-xl">📋</span>
                </div>
                <div>
                    <h3 class="font-bold text-[#2C1810] mb-1">Все документы — наши заботы</h3>
                    <p class="text-[#2C1810]/50 text-sm leading-relaxed">Договор купли-продажи, снятие с учёта, проверка юрчистоты. Вы просто забираете новую машину.</p>
                </div>
            </div>

            <!-- 4 -->
            <div class="bg-white rounded-2xl p-6 flex gap-4 items-start border border-[#C8963E]/10 hover:border-[#C8963E]/30 transition-all">
                <div class="w-10 h-10 bg-[#0D7377]/10 rounded-xl flex items-center justify-center flex-shrink-0 mt-0.5">
                    <span class="text-xl">🔄</span>
                </div>
                <div>
                    <h3 class="font-bold text-[#2C1810] mb-1">Берём машину в любом состоянии</h3>
                    <p class="text-[#2C1810]/50 text-sm leading-relaxed">Битая, в кредите, в залоге, не на ходу — неважно. Пригоните или вызовете эвакуатор за наш счёт.</p>
                </div>
            </div>

            <!-- 5 -->
            <div class="bg-white rounded-2xl p-6 flex gap-4 items-start border border-[#C8963E]/10 hover:border-[#C8963E]/30 transition-all">
                <div class="w-10 h-10 bg-[#C8963E]/10 rounded-xl flex items-center justify-center flex-shrink-0 mt-0.5">
                    <span class="text-xl">🧾</span>
                </div>
                <div>
                    <h3 class="font-bold text-[#2C1810] mb-1">Платите только разницу</h3>
                    <p class="text-[#2C1810]/50 text-sm leading-relaxed">Стоимость вашего авто идёт в зачёт нового. Доплачиваете только разницу — никаких скрытых комиссий и процентов.</p>
                </div>
            </div>

        </div>
    </div>
</section>

    <!-- Примеры обменов -->
    <section class="py-20 px-6">
        <div class="max-w-6xl mx-auto">
            <h2 class="text-4xl font-extrabold text-[#2C1810] text-center mb-4">Примеры выгодных обменов</h2>
            <p class="text-[#2C1810]/50 text-center mb-14 max-w-xl mx-auto">Реальные сделки наших клиентов</p>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Пример 1 -->
                <div class="bg-white rounded-3xl shadow-lg border border-[#C8963E]/10 overflow-hidden hover:shadow-xl transition-all hover:-translate-y-1">
                    <div class="bg-[#F5EDE3] p-6 text-center">
                        <p class="text-xs text-[#2C1810]/40 uppercase font-bold mb-1">Было</p>
                        <p class="text-xl font-extrabold text-[#2C1810]">Hyundai Solaris</p>
                        <p class="text-sm text-[#2C1810]/50">2018 год</p>
                    </div>
                    <div class="flex items-center justify-center py-3 bg-[#2C1810]">
                        <span class="text-[#C8963E] text-xs font-bold">ДОПЛАТА: 450 000 ₽</span>
                    </div>
                    <div class="bg-[#0D7377]/5 p-6 text-center">
                        <p class="text-xs text-[#0D7377] uppercase font-bold mb-1">Стало</p>
                        <p class="text-xl font-extrabold text-[#2C1810]">Geely Monjaro</p>
                        <p class="text-sm text-[#2C1810]/50">2024 год</p>
                    </div>
                </div>

                <!-- Пример 2 -->
                <div class="bg-white rounded-3xl shadow-lg border border-[#C8963E]/10 overflow-hidden hover:shadow-xl transition-all hover:-translate-y-1">
                    <div class="bg-[#F5EDE3] p-6 text-center">
                        <p class="text-xs text-[#2C1810]/40 uppercase font-bold mb-1">Было</p>
                        <p class="text-xl font-extrabold text-[#2C1810]">Kia Rio</p>
                        <p class="text-sm text-[#2C1810]/50">2019 год</p>
                    </div>
                    <div class="flex items-center justify-center py-3 bg-[#2C1810]">
                        <span class="text-[#C8963E] text-xs font-bold">ДОПЛАТА: 380 000 ₽</span>
                    </div>
                    <div class="bg-[#0D7377]/5 p-6 text-center">
                        <p class="text-xs text-[#0D7377] uppercase font-bold mb-1">Стало</p>
                        <p class="text-xl font-extrabold text-[#2C1810]">Chery Tiggo 7</p>
                        <p class="text-sm text-[#2C1810]/50">2024 год</p>
                    </div>
                </div>

                <!-- Пример 3 -->
                <div class="bg-white rounded-3xl shadow-lg border border-[#C8963E]/10 overflow-hidden hover:shadow-xl transition-all hover:-translate-y-1">
                    <div class="bg-[#F5EDE3] p-6 text-center">
                        <p class="text-xs text-[#2C1810]/40 uppercase font-bold mb-1">Было</p>
                        <p class="text-xl font-extrabold text-[#2C1810]">Lada Vesta</p>
                        <p class="text-sm text-[#2C1810]/50">2020 год</p>
                    </div>
                    <div class="flex items-center justify-center py-3 bg-[#2C1810]">
                        <span class="text-[#C8963E] text-xs font-bold">ДОПЛАТА: 290 000 ₽</span>
                    </div>
                    <div class="bg-[#0D7377]/5 p-6 text-center">
                        <p class="text-xs text-[#0D7377] uppercase font-bold mb-1">Стало</p>
                        <p class="text-xl font-extrabold text-[#2C1810]">Omoda C5</p>
                        <p class="text-sm text-[#2C1810]/50">2024 год</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA -->
    <section class="bg-[#2C1810] py-20 px-6 text-center">
        <div class="max-w-2xl mx-auto">
            <h2 class="text-4xl font-extrabold text-white mb-4">Готовы к обмену?</h2>
            <p class="text-white/50 mb-8">Оставьте заявку, и наш менеджер подберёт лучший вариант для вас</p>
            <div class="flex flex-col sm:flex-row gap-3 justify-center max-w-md mx-auto">
                <input
                    type="text"
                    placeholder="Ваше имя"
                    class="flex-1 bg-white border border-[#C8963E]/20 rounded-xl px-5 py-4 text-[#2C1810] placeholder-[#2C1810]/40 focus:outline-none focus:border-[#C8963E] transition-all"
                >
                <input
                    type="tel"
                    placeholder="+7 (___) ___-__-__"
                    class="flex-1 bg-white border border-[#C8963E]/20 rounded-xl px-5 py-4 text-[#2C1810] placeholder-[#2C1810]/40 focus:outline-none focus:border-[#C8963E] transition-all"
                >
                <button class="bg-[#C8963E] hover:bg-[#B8860B] text-white font-bold px-8 py-4 rounded-xl transition-all shadow-lg shadow-[#C8963E]/25 whitespace-nowrap">
                    Записаться
                </button>
            </div>
        </div>
    </section>

    <!-- Подвал -->
    <footer class="bg-[#1A0E0A] py-12 px-6">
        <div class="max-w-6xl mx-auto">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 text-white">
                <div>
                    <span class="text-xl font-extrabold">Avto<span class="text-[#C8963E]">Blog</span></span>
                    <p class="text-white/50 text-sm mt-2">Сервис продажи и обмена авто. Аукцион, трейд-ин и кредитование.</p>
                </div>
                <div>
                    <h3 class="font-bold mb-3">Навигация</h3>
                    <ul class="space-y-2 text-sm text-white/50">
                        <li><a href="/" class="hover:text-[#C8963E]">Главная</a></li>
                        <li><a href="/trade-in" class="text-[#C8963E]">Trade‑In</a></li>
                        <li><a href="#" class="hover:text-[#C8963E]">Кредит</a></li>
                        <li><a href="#" class="hover:text-[#C8963E]">Блог</a></li>
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
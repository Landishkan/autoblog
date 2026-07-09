<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Блог — АвтоБлог</title>
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
                    <a href="/blog" class="text-[#C8963E] text-sm font-bold">Блог</a>
                    <a href="#" class="text-white/70 hover:text-[#C8963E] transition-colors text-sm font-medium">Отзывы</a>
                </nav>
                <a href="#" class="hidden lg:inline-flex bg-[#C8963E] hover:bg-[#B8860B] text-white font-bold px-5 py-2 rounded-lg text-sm transition-all">
                    Оценить авто
                </a>
            </div>
        </div>
    </header>

    <!-- Заголовок -->
    <section class="py-16 px-6">
        <div class="max-w-6xl mx-auto">
            <h1 class="text-5xl font-extrabold text-[#2C1810] mb-4">Блог</h1>
            <p class="text-[#2C1810]/50 text-lg max-w-xl">Честные статьи про продажу, обмен и кредитование авто. Без воды и рекламных текстов.</p>
        </div>
    </section>

    <!-- Категории -->
    <section class="px-6 pb-10">
        <div class="max-w-6xl mx-auto">
            <div class="flex flex-wrap gap-2">
                <button class="bg-[#2C1810] text-white px-5 py-2 rounded-full text-sm font-bold">Все</button>
                <button class="bg-white text-[#2C1810] border border-[#C8963E]/20 px-5 py-2 rounded-full text-sm font-medium hover:border-[#C8963E] transition-colors">Продажа</button>
                <button class="bg-white text-[#2C1810] border border-[#C8963E]/20 px-5 py-2 rounded-full text-sm font-medium hover:border-[#C8963E] transition-colors">Trade-In</button>
                <button class="bg-white text-[#2C1810] border border-[#C8963E]/20 px-5 py-2 rounded-full text-sm font-medium hover:border-[#C8963E] transition-colors">Кредит</button>
                <button class="bg-white text-[#2C1810] border border-[#C8963E]/20 px-5 py-2 rounded-full text-sm font-medium hover:border-[#C8963E] transition-colors">Авто с пробегом</button>
                <button class="bg-white text-[#2C1810] border border-[#C8963E]/20 px-5 py-2 rounded-full text-sm font-medium hover:border-[#C8963E] transition-colors">Новости рынка</button>
            </div>
        </div>
    </section>

    <!-- Сетка статей -->
    <section class="px-6 pb-20">
        <div class="max-w-6xl mx-auto">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

                <!-- Статья 1 -->
                <article class="bg-white rounded-2xl overflow-hidden border border-[#C8963E]/10 shadow-sm hover:shadow-md transition-all hover:-translate-y-1">
                    <div class="h-48 bg-[#F5EDE3] overflow-hidden">
                        <img src="https://placehold.co/600x400/F5EDE3/2C1810?text=%D0%9F%D1%80%D0%BE%D0%B4%D0%B0%D0%B6%D0%B0" class="w-full h-full object-cover" alt="Статья">
                    </div>
                    <div class="p-6">
                        <div class="flex items-center gap-3 mb-3">
                            <span class="bg-[#C8963E]/10 text-[#C8963E] text-xs font-bold px-3 py-1 rounded-full">Продажа</span>
                            <span class="text-[#2C1810]/30 text-xs">5 мин</span>
                        </div>
                        <h3 class="text-lg font-bold text-[#2C1810] leading-snug mb-2 hover:text-[#C8963E] transition-colors">
                            <a href="#">Как продать машину за выходные и не прогадать с ценой</a>
                        </h3>
                        <p class="text-[#2C1810]/50 text-sm leading-relaxed line-clamp-2">Разбираем три способа: самому, через перекупа и аукцион. Плюсы, минусы и реальные цифры.</p>
                        <div class="mt-4 pt-4 border-t border-[#C8963E]/10">
                            <span class="text-[#2C1810]/30 text-xs">12 марта 2025</span>
                        </div>
                    </div>
                </article>

                <!-- Статья 2 -->
                <article class="bg-white rounded-2xl overflow-hidden border border-[#C8963E]/10 shadow-sm hover:shadow-md transition-all hover:-translate-y-1">
                    <div class="h-48 bg-[#F5EDE3] overflow-hidden">
                        <img src="https://placehold.co/600x400/F5EDE3/2C1810?text=Trade-In" class="w-full h-full object-cover" alt="Статья">
                    </div>
                    <div class="p-6">
                        <div class="flex items-center gap-3 mb-3">
                            <span class="bg-[#0D7377]/10 text-[#0D7377] text-xs font-bold px-3 py-1 rounded-full">Trade-In</span>
                            <span class="text-[#2C1810]/30 text-xs">7 мин</span>
                        </div>
                        <h3 class="text-lg font-bold text-[#2C1810] leading-snug mb-2 hover:text-[#C8963E] transition-colors">
                            <a href="#">Trade-in: как не потерять 200 тысяч при обмене авто</a>
                        </h3>
                        <p class="text-[#2C1810]/50 text-sm leading-relaxed line-clamp-2">Почему салоны занижают цену и как получить рыночную стоимость за старую машину.</p>
                        <div class="mt-4 pt-4 border-t border-[#C8963E]/10">
                            <span class="text-[#2C1810]/30 text-xs">8 марта 2025</span>
                        </div>
                    </div>
                </article>

                <!-- Статья 3 -->
                <article class="bg-white rounded-2xl overflow-hidden border border-[#C8963E]/10 shadow-sm hover:shadow-md transition-all hover:-translate-y-1">
                    <div class="h-48 bg-[#F5EDE3] overflow-hidden">
                        <img src="https://placehold.co/600x400/F5EDE3/2C1810?text=%D0%9A%D1%80%D0%B5%D0%B4%D0%B8%D1%82" class="w-full h-full object-cover" alt="Статья">
                    </div>
                    <div class="p-6">
                        <div class="flex items-center gap-3 mb-3">
                            <span class="bg-[#0D7377]/10 text-[#0D7377] text-xs font-bold px-3 py-1 rounded-full">Кредит</span>
                            <span class="text-[#2C1810]/30 text-xs">4 мин</span>
                        </div>
                        <h3 class="text-lg font-bold text-[#2C1810] leading-snug mb-2 hover:text-[#C8963E] transition-colors">
                            <a href="#">Кредит под залог авто: когда это выгоднее, чем продавать</a>
                        </h3>
                        <p class="text-[#2C1810]/50 text-sm leading-relaxed line-clamp-2">Машина остаётся у вас, а деньги уже на карте. Разбираем на реальном примере с цифрами.</p>
                        <div class="mt-4 pt-4 border-t border-[#C8963E]/10">
                            <span class="text-[#2C1810]/30 text-xs">3 марта 2025</span>
                        </div>
                    </div>
                </article>

                <!-- Статья 4 -->
                <article class="bg-white rounded-2xl overflow-hidden border border-[#C8963E]/10 shadow-sm hover:shadow-md transition-all hover:-translate-y-1">
                    <div class="h-48 bg-[#F5EDE3] overflow-hidden">
                        <img src="https://placehold.co/600x400/F5EDE3/2C1810?text=%D0%A0%D1%8B%D0%BD%D0%BE%D0%BA" class="w-full h-full object-cover" alt="Статья">
                    </div>
                    <div class="p-6">
                        <div class="flex items-center gap-3 mb-3">
                            <span class="bg-[#C8963E]/10 text-[#C8963E] text-xs font-bold px-3 py-1 rounded-full">Новости рынка</span>
                            <span class="text-[#2C1810]/30 text-xs">3 мин</span>
                        </div>
                        <h3 class="text-lg font-bold text-[#2C1810] leading-snug mb-2 hover:text-[#C8963E] transition-colors">
                            <a href="#">Что происходит с ценами на авто в 2025 году</a>
                        </h3>
                        <p class="text-[#2C1810]/50 text-sm leading-relaxed line-clamp-2">Китайские бренды давят рынок, параллельный импорт буксует. К чему готовиться продавцам.</p>
                        <div class="mt-4 pt-4 border-t border-[#C8963E]/10">
                            <span class="text-[#2C1810]/30 text-xs">28 февраля 2025</span>
                        </div>
                    </div>
                </article>

                <!-- Статья 5 -->
                <article class="bg-white rounded-2xl overflow-hidden border border-[#C8963E]/10 shadow-sm hover:shadow-md transition-all hover:-translate-y-1">
                    <div class="h-48 bg-[#F5EDE3] overflow-hidden">
                        <img src="https://placehold.co/600x400/F5EDE3/2C1810?text=%D0%9F%D1%80%D0%BE%D0%B1%D0%B5%D0%B3" class="w-full h-full object-cover" alt="Статья">
                    </div>
                    <div class="p-6">
                        <div class="flex items-center gap-3 mb-3">
                            <span class="bg-[#C8963E]/10 text-[#C8963E] text-xs font-bold px-3 py-1 rounded-full">Авто с пробегом</span>
                            <span class="text-[#2C1810]/30 text-xs">6 мин</span>
                        </div>
                        <h3 class="text-lg font-bold text-[#2C1810] leading-snug mb-2 hover:text-[#C8963E] transition-colors">
                            <a href="#">Список из 5 вещей, которые надо сделать перед продажей авто</a>
                        </h3>
                        <p class="text-[#2C1810]/50 text-sm leading-relaxed line-clamp-2">Мойка, химчистка, пара мелочей в салоне — и цена вырастает на десятки тысяч. Проверено.</p>
                        <div class="mt-4 pt-4 border-t border-[#C8963E]/10">
                            <span class="text-[#2C1810]/30 text-xs">20 февраля 2025</span>
                        </div>
                    </div>
                </article>

                <!-- Статья 6 -->
                <article class="bg-white rounded-2xl overflow-hidden border border-[#C8963E]/10 shadow-sm hover:shadow-md transition-all hover:-translate-y-1">
                    <div class="h-48 bg-[#F5EDE3] overflow-hidden">
                        <img src="https://placehold.co/600x400/F5EDE3/2C1810?text=%D0%90%D1%83%D0%BA%D1%86%D0%B8%D0%BE%D0%BD" class="w-full h-full object-cover" alt="Статья">
                    </div>
                    <div class="p-6">
                        <div class="flex items-center gap-3 mb-3">
                            <span class="bg-[#C8963E]/10 text-[#C8963E] text-xs font-bold px-3 py-1 rounded-full">Продажа</span>
                            <span class="text-[#2C1810]/30 text-xs">5 мин</span>
                        </div>
                        <h3 class="text-lg font-bold text-[#2C1810] leading-snug mb-2 hover:text-[#C8963E] transition-colors">
                            <a href="#">Онлайн-аукцион против перекупа: кто даёт больше денег</a>
                        </h3>
                        <p class="text-[#2C1810]/50 text-sm leading-relaxed line-clamp-2">Сравнили на одной и той же машине. Результат аукциона оказался выше на 87 тысяч. Вот почему.</p>
                        <div class="mt-4 pt-4 border-t border-[#C8963E]/10">
                            <span class="text-[#2C1810]/30 text-xs">15 февраля 2025</span>
                        </div>
                    </div>
                </article>

            </div>

            <!-- Пагинация -->
            <div class="flex justify-center mt-12 gap-2">
                <button class="w-10 h-10 rounded-full bg-[#2C1810] text-white font-bold text-sm">1</button>
                <button class="w-10 h-10 rounded-full bg-white border border-[#C8963E]/20 text-[#2C1810] font-medium text-sm hover:border-[#C8963E] transition-colors">2</button>
                <button class="w-10 h-10 rounded-full bg-white border border-[#C8963E]/20 text-[#2C1810] font-medium text-sm hover:border-[#C8963E] transition-colors">3</button>
                <button class="w-10 h-10 rounded-full bg-white border border-[#C8963E]/20 text-[#2C1810] font-medium text-sm hover:border-[#C8963E] transition-colors">→</button>
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
                        <li><a href="/" class="hover:text-[#C8963E]">Главная</a></li>
                        <li><a href="/trade-in" class="hover:text-[#C8963E]">Trade‑In</a></li>
                        <li><a href="/credit" class="hover:text-[#C8963E]">Кредит</a></li>
                        <li><a href="/blog" class="text-[#C8963E]">Блог</a></li>
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
</html><?php /**PATH /Users/lianavaleeva/Herd/autoblog/resources/views/blog.blade.php ENDPATH**/ ?>
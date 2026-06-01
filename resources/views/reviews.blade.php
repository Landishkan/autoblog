<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Отзывы — АвтоБлог</title>
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
                    <a href="/reviews" class="text-[#C8963E] text-sm font-bold">Отзывы</a>
                </nav>
                <a href="#" class="hidden lg:inline-flex bg-[#C8963E] hover:bg-[#B8860B] text-white font-bold px-5 py-2 rounded-lg text-sm transition-all">
                    Оценить авто
                </a>
            </div>
        </div>
    </header>

    <!-- Заголовок -->
    <section class="py-16 px-6">
        <div class="max-w-6xl mx-auto text-center">
            <h1 class="text-5xl font-extrabold text-[#2C1810] mb-4">Отзывы наших клиентов</h1>
            <p class="text-[#2C1810]/50 text-lg max-w-xl mx-auto">Не придуманы. Не проплачены. Реальные люди, которые продали или обменяли авто через нас.</p>
        </div>
    </section>

    <!-- Сетка отзывов -->
    <section class="px-6 pb-20">
        <div class="max-w-6xl mx-auto">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

                <!-- Отзыв 1 -->
                <div class="bg-white rounded-2xl p-6 border border-[#C8963E]/10 shadow-sm">
                    <div class="flex items-start gap-4 mb-4">
                        <div class="w-12 h-12 bg-[#0D7377] rounded-full flex items-center justify-center text-white font-bold flex-shrink-0">АН</div>
                        <div>
                            <p class="font-bold text-[#2C1810]">Анна Н.</p>
                            <p class="text-[#2C1810]/40 text-xs">Hyundai Creta, 2019</p>
                        </div>
                    </div>
                    <p class="text-[#2C1810]/60 text-sm leading-relaxed mb-4">
                        Боялась связываться с перекупами после историй подруг. Здесь всё прошло на удивление спокойно: приехала, через час уже сидела с деньгами в кофейне напротив. Машину оценили на 40 тысяч выше, чем предлагали в салоне по трейд-ин.
                    </p>
                    <div class="flex items-center justify-between pt-3 border-t border-[#C8963E]/10">
                        <span class="text-[#2C1810]/30 text-xs">2 недели назад</span>
                        <span class="text-[#0D7377] text-sm font-bold">+40 000 ₽ к трейд-ин</span>
                    </div>
                </div>

                <!-- Отзыв 2 -->
                <div class="bg-white rounded-2xl p-6 border border-[#C8963E]/10 shadow-sm">
                    <div class="flex items-start gap-4 mb-4">
                        <div class="w-12 h-12 bg-[#C8963E] rounded-full flex items-center justify-center text-white font-bold flex-shrink-0">СВ</div>
                        <div>
                            <p class="font-bold text-[#2C1810]">Сергей В.</p>
                            <p class="text-[#2C1810]/40 text-xs">BMW X3, 2017</p>
                        </div>
                    </div>
                    <p class="text-[#2C1810]/60 text-sm leading-relaxed mb-4">
                        Продавал свой X3 три недели сам: звонки в 11 вечера, торг у подъезда, один чудак вообще без прав приехал. Плюнул, отдал на аукцион. Через 2 дня деньги на карте, цена устроила. Нервы дороже.
                    </p>
                    <div class="flex items-center justify-between pt-3 border-t border-[#C8963E]/10">
                        <span class="text-[#2C1810]/30 text-xs">месяц назад</span>
                        <span class="text-[#0D7377] text-sm font-bold">+65 000 ₽ к трейд-ин</span>
                    </div>
                </div>

                <!-- Отзыв 3 -->
                <div class="bg-white rounded-2xl p-6 border border-[#C8963E]/10 shadow-sm">
                    <div class="flex items-start gap-4 mb-4">
                        <div class="w-12 h-12 bg-[#0D7377] rounded-full flex items-center justify-center text-white font-bold flex-shrink-0">МК</div>
                        <div>
                            <p class="font-bold text-[#2C1810]">Марина К.</p>
                            <p class="text-[#2C1810]/40 text-xs">Kia Rio, 2020</p>
                        </div>
                    </div>
                    <p class="text-[#2C1810]/60 text-sm leading-relaxed mb-4">
                        Муж сказал «разбирайся сама». Я вообще не понимала, с чего начать. Позвонила, девушка-менеджер всё объяснила спокойно, без давления. Приехали, оценили, продали. Муж теперь советует друзьям.
                    </p>
                    <div class="flex items-center justify-between pt-3 border-t border-[#C8963E]/10">
                        <span class="text-[#2C1810]/30 text-xs">3 недели назад</span>
                        <span class="text-[#0D7377] text-sm font-bold">+28 000 ₽ к трейд-ин</span>
                    </div>
                </div>

                <!-- Отзыв 4 -->
                <div class="bg-white rounded-2xl p-6 border border-[#C8963E]/10 shadow-sm">
                    <div class="flex items-start gap-4 mb-4">
                        <div class="w-12 h-12 bg-[#C8963E] rounded-full flex items-center justify-center text-white font-bold flex-shrink-0">ДП</div>
                        <div>
                            <p class="font-bold text-[#2C1810]">Дмитрий П.</p>
                            <p class="text-[#2C1810]/40 text-xs">Toyota Camry, 2018</p>
                        </div>
                    </div>
                    <p class="text-[#2C1810]/60 text-sm leading-relaxed mb-4">
                        Камри в идеале, думал продам за неделю сам. Месяц висело объявление, одни перекупы с дурацкими предложениями. На аукционе цена вышла на 80 выше, чем лучший оффер от живого покупателя. Жалею, что не приехал сразу.
                    </p>
                    <div class="flex items-center justify-between pt-3 border-t border-[#C8963E]/10">
                        <span class="text-[#2C1810]/30 text-xs">1.5 месяца назад</span>
                        <span class="text-[#0D7377] text-sm font-bold">+80 000 ₽ к рынку</span>
                    </div>
                </div>

                <!-- Отзыв 5 -->
                <div class="bg-white rounded-2xl p-6 border border-[#C8963E]/10 shadow-sm">
                    <div class="flex items-start gap-4 mb-4">
                        <div class="w-12 h-12 bg-[#0D7377] rounded-full flex items-center justify-center text-white font-bold flex-shrink-0">ЕС</div>
                        <div>
                            <p class="font-bold text-[#2C1810]">Елена С.</p>
                            <p class="text-[#2C1810]/40 text-xs">Volkswagen Polo, 2021</p>
                        </div>
                    </div>
                    <p class="text-[#2C1810]/60 text-sm leading-relaxed mb-4">
                        Обменивала Polo на Tiguan через трейд-ин. Доплата вышла меньше, чем в двух других салонах, где я была. Плюс сделали скидку как постоянному клиенту. Теперь всем коллегам советую.
                    </p>
                    <div class="flex items-center justify-between pt-3 border-t border-[#C8963E]/10">
                        <span class="text-[#2C1810]/30 text-xs">2 недели назад</span>
                        <span class="text-[#0D7377] text-sm font-bold">-45 000 ₽ к доплате</span>
                    </div>
                </div>

                <!-- Отзыв 6 -->
                <div class="bg-white rounded-2xl p-6 border border-[#C8963E]/10 shadow-sm">
                    <div class="flex items-start gap-4 mb-4">
                        <div class="w-12 h-12 bg-[#C8963E] rounded-full flex items-center justify-center text-white font-bold flex-shrink-0">АГ</div>
                        <div>
                            <p class="font-bold text-[#2C1810]">Алексей Г.</p>
                            <p class="text-[#2C1810]/40 text-xs">Lada Vesta, 2022</p>
                        </div>
                    </div>
                    <p class="text-[#2C1810]/60 text-sm leading-relaxed mb-4">
                        Весту продал за день. Был мелкий косяк по кузову, думал снизят цену — нет, зафиксировали, но на торгах всё равно дали хорошую сумму. Ребята адекватные, без понтов. Приеду ещё, когда следующую менять буду.
                    </p>
                    <div class="flex items-center justify-between pt-3 border-t border-[#C8963E]/10">
                        <span class="text-[#2C1810]/30 text-xs">месяц назад</span>
                        <span class="text-[#0D7377] text-sm font-bold">+22 000 ₽ к трейд-ин</span>
                    </div>
                </div>

                <!-- Отзыв 7 -->
                <div class="bg-white rounded-2xl p-6 border border-[#C8963E]/10 shadow-sm">
                    <div class="flex items-start gap-4 mb-4">
                        <div class="w-12 h-12 bg-[#0D7377] rounded-full flex items-center justify-center text-white font-bold flex-shrink-0">ОН</div>
                        <div>
                            <p class="font-bold text-[#2C1810]">Олег Н.</p>
                            <p class="text-[#2C1810]/40 text-xs">Skoda Octavia, 2016</p>
                        </div>
                    </div>
                    <p class="text-[#2C1810]/60 text-sm leading-relaxed mb-4">
                        Октавия с пробегом под 200 тысяч. Думал вообще никто не возьмёт. Взяли, торговались дилеры из трёх городов. Цена вышла скромная, но хоть не пришлось разбирать на запчасти. Деньги сразу.
                    </p>
                    <div class="flex items-center justify-between pt-3 border-t border-[#C8963E]/10">
                        <span class="text-[#2C1810]/30 text-xs">2 месяца назад</span>
                        <span class="text-[#0D7377] text-sm font-bold">+18 000 ₽ к трейд-ин</span>
                    </div>
                </div>

                <!-- Отзыв 8 -->
                <div class="bg-white rounded-2xl p-6 border border-[#C8963E]/10 shadow-sm">
                    <div class="flex items-start gap-4 mb-4">
                        <div class="w-12 h-12 bg-[#C8963E] rounded-full flex items-center justify-center text-white font-bold flex-shrink-0">ТМ</div>
                        <div>
                            <p class="font-bold text-[#2C1810]">Татьяна М.</p>
                            <p class="text-[#2C1810]/40 text-xs">Nissan Qashqai, 2019</p>
                        </div>
                    </div>
                    <p class="text-[#2C1810]/60 text-sm leading-relaxed mb-4">
                        Приехала просто узнать цену из любопытства. В итоге продала в тот же день — предложение оказалось выше, чем я ожидала. Кофе вкусный, кстати. И менеджер Андрей — приятный парень.
                    </p>
                    <div class="flex items-center justify-between pt-3 border-t border-[#C8963E]/10">
                        <span class="text-[#2C1810]/30 text-xs">3 недели назад</span>
                        <span class="text-[#0D7377] text-sm font-bold">+35 000 ₽ к трейд-ин</span>
                    </div>
                </div>

                <!-- Отзыв 9 -->
                <div class="bg-white rounded-2xl p-6 border border-[#C8963E]/10 shadow-sm">
                    <div class="flex items-start gap-4 mb-4">
                        <div class="w-12 h-12 bg-[#0D7377] rounded-full flex items-center justify-center text-white font-bold flex-shrink-0">РА</div>
                        <div>
                            <p class="font-bold text-[#2C1810]">Руслан А.</p>
                            <p class="text-[#2C1810]/40 text-xs">Chery Tiggo 4, 2023</p>
                        </div>
                    </div>
                    <p class="text-[#2C1810]/60 text-sm leading-relaxed mb-4">
                        Продавал китайца — боялся, что спроса нет. Оказалось, дилеры из регионов охотятся за свежими Tiggo. Уехал с деньгами через полтора часа. Жене цветы купил на сэкономленное время.
                    </p>
                    <div class="flex items-center justify-between pt-3 border-t border-[#C8963E]/10">
                        <span class="text-[#2C1810]/30 text-xs">2 недели назад</span>
                        <span class="text-[#0D7377] text-sm font-bold">+55 000 ₽ к трейд-ин</span>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- CTA -->
    <section class="bg-[#2C1810] py-20 px-6 text-center">
        <div class="max-w-2xl mx-auto">
            <h2 class="text-4xl font-extrabold text-white mb-4">Хотите так же?</h2>
            <p class="text-white/50 mb-8">Оставьте заявку — оценим ваш авто за минуту</p>
            <div class="flex flex-col sm:flex-row gap-3 justify-center max-w-md mx-auto">
                <input type="text" placeholder="Госномер" class="flex-1 bg-white border border-[#C8963E]/20 rounded-xl px-5 py-4 text-[#2C1810] placeholder-[#2C1810]/40 focus:outline-none focus:border-[#C8963E] transition-all">
                <button class="bg-[#C8963E] hover:bg-[#B8860B] text-white font-bold px-8 py-4 rounded-xl transition-all shadow-lg shadow-[#C8963E]/25 whitespace-nowrap">
                    Узнать цену
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
                        <li><a href="/trade-in" class="hover:text-[#C8963E]">Trade‑In</a></li>
                        <li><a href="/credit" class="hover:text-[#C8963E]">Кредит</a></li>
                        <li><a href="/blog" class="hover:text-[#C8963E]">Блог</a></li>
                        <li><a href="/reviews" class="text-[#C8963E]">Отзывы</a></li>
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
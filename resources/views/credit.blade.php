<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Кредит — АвтоБлог</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        * { font-family: 'Manrope', sans-serif; }
        details summary::-webkit-details-marker { display: none; }
        details summary { list-style: none; cursor: pointer; }
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
                    <a href="/credit" class="text-[#C8963E] text-sm font-bold">Кредит</a>
                    <a href="/blog" class="text-white/70 hover:text-[#C8963E] transition-colors text-sm font-medium">Блог</a>
                    <a href="/reviews" class="text-white/70 hover:text-[#C8963E] transition-colors text-sm font-medium">Отзывы</a>
                </nav>
                <a href="#" class="hidden lg:inline-flex bg-[#C8963E] hover:bg-[#B8860B] text-white font-bold px-5 py-2 rounded-lg text-sm transition-all">
                    Оценить авто
                </a>
            </div>
        </div>
    </header>

    <!-- Hero -->
    <section class="py-20 px-6">
        <div class="max-w-4xl mx-auto text-center">
            <div class="inline-flex items-center px-4 py-1.5 rounded-full bg-[#0D7377]/10 text-[#0D7377] text-xs font-bold uppercase tracking-widest mb-6">
                Финансовые решения
            </div>
            <h1 class="text-5xl md:text-7xl font-extrabold text-[#2C1810] leading-none mb-6">
                Ваш авто работает<br>
                <span class="text-[#C8963E]">на вас</span> уже сегодня
            </h1>
            <p class="text-lg text-[#2C1810]/60 mb-12 max-w-2xl mx-auto leading-relaxed">
                Купите машину в кредит по ставке от 3,9% или получите деньги под залог своего авто, продолжая на нём ездить
            </p>

            <!-- Две плитки выбора -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-5 max-w-2xl mx-auto mb-12">
                <a href="#buy" class="bg-white rounded-2xl p-8 border border-[#C8963E]/10 shadow-md hover:border-[#C8963E] hover:shadow-lg transition-all text-left group">
                    <div class="w-12 h-12 bg-[#C8963E]/10 rounded-xl flex items-center justify-center mb-4 group-hover:bg-[#C8963E]/20 transition-colors">
                        <span class="text-2xl">🚗</span>
                    </div>
                    <h3 class="text-xl font-bold text-[#2C1810] mb-2">Купить авто в кредит</h3>
                    <p class="text-[#2C1810]/50 text-sm leading-relaxed">Подберём машину и оформим кредит прямо у нас. Ставка от 3,9%, первый взнос от 10%</p>
                </a>

                <a href="#pledge" class="bg-white rounded-2xl p-8 border border-[#C8963E]/10 shadow-md hover:border-[#0D7377] hover:shadow-lg transition-all text-left group">
                    <div class="w-12 h-12 bg-[#0D7377]/10 rounded-xl flex items-center justify-center mb-4 group-hover:bg-[#0D7377]/20 transition-colors">
                        <span class="text-2xl">🔐</span>
                    </div>
                    <h3 class="text-xl font-bold text-[#2C1810] mb-2">Деньги под залог авто</h3>
                    <p class="text-[#2C1810]/50 text-sm leading-relaxed">Машина остаётся у вас. Деньги — у вас. ПТС хранится в банке-партнёре. До 90% рыночной стоимости</p>
                </a>
            </div>
        </div>
    </section>

    <!-- Калькулятор кредита на покупку -->
    <section id="buy" class="py-16 px-6 bg-white">
        <div class="max-w-3xl mx-auto">
            <div class="flex items-center gap-3 mb-8">
                <div class="w-10 h-10 bg-[#C8963E]/10 rounded-xl flex items-center justify-center">
                    <span class="text-xl">🚗</span>
                </div>
                <h2 class="text-3xl font-extrabold text-[#2C1810]">Кредит на покупку авто</h2>
            </div>

            <div class="bg-[#FBF7F0] rounded-3xl p-8 border border-[#C8963E]/10">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="text-xs font-bold text-[#2C1810]/50 uppercase tracking-wider">Стоимость авто</label>
                        <input type="range" min="500000" max="5000000" step="50000" value="2000000" class="w-full mt-2 accent-[#C8963E]">
                        <p class="text-[#2C1810] font-bold mt-1">2 000 000 ₽</p>
                    </div>
                    <div>
                        <label class="text-xs font-bold text-[#2C1810]/50 uppercase tracking-wider">Первоначальный взнос</label>
                        <input type="range" min="10" max="90" step="5" value="30" class="w-full mt-2 accent-[#C8963E]">
                        <p class="text-[#2C1810] font-bold mt-1">30% — 600 000 ₽</p>
                    </div>
                    <div>
                        <label class="text-xs font-bold text-[#2C1810]/50 uppercase tracking-wider">Срок кредита</label>
                        <select class="w-full bg-white border border-[#C8963E]/20 rounded-xl px-4 py-3 mt-2 text-[#2C1810] focus:outline-none focus:border-[#C8963E]">
                            <option>12 месяцев</option>
                            <option>24 месяца</option>
                            <option selected>36 месяцев</option>
                            <option>48 месяцев</option>
                            <option>60 месяцев</option>
                        </select>
                    </div>
                    <div class="bg-[#C8963E]/5 rounded-2xl p-5 flex flex-col justify-center">
                        <p class="text-xs text-[#2C1810]/50 uppercase font-bold">Ежемесячный платёж</p>
                        <p class="text-3xl font-extrabold text-[#C8963E] mt-1">~ 28 500 ₽</p>
                        <p class="text-xs text-[#2C1810]/40 mt-1">Ставка от 3.9%</p>
                    </div>
                </div>
                <button class="w-full bg-[#C8963E] hover:bg-[#B8860B] text-white font-bold py-4 rounded-xl transition-all shadow-lg mt-6">
                    Подать заявку
                </button>
            </div>
        </div>
    </section>

    <!-- Кредит под залог -->
    <section id="pledge" class="py-16 px-6 bg-[#F5EDE3]">
        <div class="max-w-3xl mx-auto">
            <div class="flex items-center gap-3 mb-8">
                <div class="w-10 h-10 bg-[#0D7377]/10 rounded-xl flex items-center justify-center">
                    <span class="text-xl">🔐</span>
                </div>
                <h2 class="text-3xl font-extrabold text-[#2C1810]">Деньги под залог авто</h2>
            </div>

            <div class="bg-white rounded-3xl p-8 border border-[#C8963E]/10">
                <!-- 3 шага -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                    <div class="text-center">
                        <div class="w-14 h-14 bg-[#0D7377]/10 rounded-2xl flex items-center justify-center mx-auto mb-3">
                            <span class="text-2xl">📸</span>
                        </div>
                        <h3 class="font-bold text-[#2C1810] mb-1">Оценка</h3>
                        <p class="text-[#2C1810]/50 text-sm">Приезжаете к нам — мы оцениваем авто за 30 минут</p>
                    </div>
                    <div class="text-center">
                        <div class="w-14 h-14 bg-[#0D7377]/10 rounded-2xl flex items-center justify-center mx-auto mb-3">
                            <span class="text-2xl">📝</span>
                        </div>
                        <h3 class="font-bold text-[#2C1810] mb-1">Договор</h3>
                        <p class="text-[#2C1810]/50 text-sm">Выдаём до 90% стоимости. ПТС хранится в банке, машина — у вас</p>
                    </div>
                    <div class="text-center">
                        <div class="w-14 h-14 bg-[#0D7377]/10 rounded-2xl flex items-center justify-center mx-auto mb-3">
                            <span class="text-2xl">💳</span>
                        </div>
                        <h3 class="font-bold text-[#2C1810] mb-1">Деньги на карту</h3>
                        <p class="text-[#2C1810]/50 text-sm">Переводим деньги в день сделки. Вы продолжаете ездить на авто</p>
                    </div>
                </div>

                <!-- Акцент -->
                <div class="bg-[#0D7377]/5 rounded-2xl p-6 text-center mb-6">
                    <p class="text-[#2C1810] font-bold text-lg">Машина остаётся у вас. Деньги — у вас.</p>
                    <p class="text-[#2C1810]/50 text-sm mt-1">Никаких скрытых комиссий. Платите только проценты по кредиту</p>
                </div>

                <button class="w-full bg-[#0D7377] hover:bg-[#0B5C5F] text-white font-bold py-4 rounded-xl transition-all shadow-lg">
                    Получить деньги
                </button>
            </div>
        </div>
    </section>

    <!-- Банки-партнёры -->
    <section class="py-16 px-6">
        <div class="max-w-3xl mx-auto text-center">
            <h2 class="text-2xl font-extrabold text-[#2C1810] mb-8">Банки-партнёры</h2>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                <div class="bg-white rounded-2xl p-6 border border-[#C8963E]/10 shadow-sm">
                    <span class="text-[#2C1810] font-extrabold text-lg">Сбер</span>
                </div>
                <div class="bg-white rounded-2xl p-6 border border-[#C8963E]/10 shadow-sm">
                    <span class="text-[#2C1810] font-extrabold text-lg">ВТБ</span>
                </div>
                <div class="bg-white rounded-2xl p-6 border border-[#C8963E]/10 shadow-sm">
                    <span class="text-[#2C1810] font-extrabold text-lg">Альфа</span>
                </div>
                <div class="bg-white rounded-2xl p-6 border border-[#C8963E]/10 shadow-sm">
                    <span class="text-[#2C1810] font-extrabold text-lg">Т‑Банк</span>
                </div>
            </div>
            <p class="text-[#2C1810]/40 text-sm mt-4">Работаем со всеми ведущими банками РФ. Подберём лучшую ставку</p>
        </div>
    </section>

    <!-- FAQ -->
    <section class="py-16 px-6 bg-[#F5EDE3]">
        <div class="max-w-3xl mx-auto">
            <h2 class="text-3xl font-extrabold text-[#2C1810] text-center mb-10">Частые вопросы</h2>

            <div class="space-y-3">
                <details class="bg-white rounded-2xl p-6 border border-[#C8963E]/10 group">
                    <summary class="font-bold text-[#2C1810] flex justify-between items-center">
                        Могу ли я получить кредит с плохой кредитной историей?
                        <span class="text-[#C8963E] group-open:rotate-45 transition-transform text-xl">+</span>
                    </summary>
                    <p class="text-[#2C1810]/50 text-sm mt-4 leading-relaxed">Да. У нас есть программы с залогом авто, где кредитная история оценивается лояльнее. Решение принимается индивидуально.</p>
                </details>

                <details class="bg-white rounded-2xl p-6 border border-[#C8963E]/10 group">
                    <summary class="font-bold text-[#2C1810] flex justify-between items-center">
                        Нужно ли оставлять машину в банке?
                        <span class="text-[#C8963E] group-open:rotate-45 transition-transform text-xl">+</span>
                    </summary>
                    <p class="text-[#2C1810]/50 text-sm mt-4 leading-relaxed">Нет. При залоговом кредитовании автомобиль остаётся у вас. В банк передаётся только ПТС на хранение.</p>
                </details>

                <details class="bg-white rounded-2xl p-6 border border-[#C8963E]/10 group">
                    <summary class="font-bold text-[#2C1810] flex justify-between items-center">
                        Какие документы нужны?
                        <span class="text-[#C8963E] group-open:rotate-45 transition-transform text-xl">+</span>
                    </summary>
                    <p class="text-[#2C1810]/50 text-sm mt-4 leading-relaxed">Паспорт, ПТС, СТС. Для крупных сумм может понадобиться второй документ — права или загранпаспорт.</p>
                </details>

                <details class="bg-white rounded-2xl p-6 border border-[#C8963E]/10 group">
                    <summary class="font-bold text-[#2C1810] flex justify-between items-center">
                        Как быстро приходят деньги?
                        <span class="text-[#C8963E] group-open:rotate-45 transition-transform text-xl">+</span>
                    </summary>
                    <p class="text-[#2C1810]/50 text-sm mt-4 leading-relaxed">В день подписания договора. Перевод на карту, через СБП или банковским переводом — как вам удобно.</p>
                </details>
            </div>
        </div>
    </section>

    <!-- CTA -->
    <section class="bg-[#2C1810] py-20 px-6 text-center">
        <div class="max-w-2xl mx-auto">
            <h2 class="text-4xl font-extrabold text-white mb-4">Готовы к решению?</h2>
            <p class="text-white/50 mb-8">Оставьте заявку — менеджер перезвонит за 5 минут и подберёт лучшие условия</p>
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
                    Отправить
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
                        <li><a href="/credit" class="text-[#C8963E]">Кредит</a></li>
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
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Кредит / Trade-In - AvtoBlog</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        * { font-family: 'Manrope', sans-serif; }
        /* Стили для модальных окон */
        .modal-backdrop {
            background-color: rgba(61, 64, 71, 0.7);
            backdrop-filter: blur(4px);
        }
    </style>
</head>
<body class="bg-[#FAF7F2]">

    <!-- Header -->
    <header class="bg-[#4A5D6B] shadow-sm sticky top-0 z-40">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <a href="/" class="text-2xl font-extrabold text-white">
                    Avto<span class="text-[#C4907C]">Blog</span>
                </a>
                
                <nav class="hidden lg:flex items-center space-x-8">
                    <a href="/" class="text-white/70 hover:text-[#C4907C] transition-colors text-sm font-medium">Главная</a>
                    <a href="/credit-trade-in" class="text-[#C4907C] font-bold text-sm">Кредит / Trade-In</a>
                    <a href="/chatbot" class="text-white/70 hover:text-[#C4907C] transition-colors text-sm font-medium">Чат-бот</a>
                    <a href="/reviews" class="text-white/70 hover:text-[#C4907C] transition-colors text-sm font-medium">Отзывы</a>
                </nav>
                
                <div class="flex items-center space-x-4">
                    <a href="tel:88001234567" class="hidden md:block text-white font-bold text-lg">8-800-123-45-67</a>
                    <!-- Кнопка теперь открывает модалку -->
                    <button onclick="openLeadModal()" class="hidden lg:inline-flex bg-[#C4907C] hover:bg-[#B07D6A] text-white font-bold px-5 py-2 rounded-lg text-sm transition-all">
                        Оставить заявку
                    </button>
                    <button id="menuBtn" class="lg:hidden p-2 rounded-lg hover:bg-[#3D4F5C]">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
        
        <div id="mobileMenu" class="hidden lg:hidden bg-[#4A5D6B] border-t border-[#3D4F5C]">
            <div class="px-4 py-4 space-y-3">
                <a href="/" class="block text-white/70 hover:text-[#C4907C] font-medium">Главная</a>
                <a href="/credit-trade-in" class="block text-[#C4907C] font-bold">Кредит / Trade-In</a>
                <a href="/chatbot" class="block text-white/70 hover:text-[#C4907C] font-medium">Чат-бот</a>
                <a href="/reviews" class="block text-white/70 hover:text-[#C4907C] font-medium">Отзывы</a>
                <button onclick="openLeadModal()" class="w-full bg-[#C4907C] text-white text-center py-3 rounded-xl font-bold">Оставить заявку</button>
            </div>
        </div>
    </header>

    <!-- Переключатель Кредит / Trade-In -->
    <section class="py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-4xl mx-auto">
            <div class="bg-white rounded-2xl shadow-lg p-2 inline-flex w-full mb-8">
                <button id="creditTab" class="flex-1 py-3 px-6 rounded-xl font-bold text-sm transition-all bg-[#C4907C] text-white">Кредит</button>
                <button id="tradeInTab" class="flex-1 py-3 px-6 rounded-xl font-bold text-sm transition-all text-[#3D4047] hover:bg-[#FAF7F2]">Trade-In</button>
            </div>

            <!-- Форма заявки (на странице) -->
            <div id="lead-form" class="bg-white rounded-3xl shadow-xl p-8 border border-[#C4907C]/10 mb-12">
                <h2 class="text-3xl font-extrabold text-[#3D4047] mb-6">Оставьте заявку</h2>
                
                <form class="lead-form-ajax space-y-4" data-type="general">
                    @csrf
                    <input type="hidden" name="service_type" value="general">
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-[#7A7D82] mb-2">Тип лица</label>
                            <select name="entity_type" class="w-full bg-[#FAF7F2] border border-[#C4907C]/20 rounded-xl px-5 py-4 text-[#3D4047] focus:outline-none focus:border-[#C4907C] focus:ring-4 focus:ring-[#C4907C]/10">
                                <option value="physical">Физическое лицо</option>
                                <option value="legal">Юридическое лицо</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-[#7A7D82] mb-2">Имя</label>
                            <input type="text" name="name" placeholder="Ваше имя" class="w-full bg-[#FAF7F2] border border-[#C4907C]/20 rounded-xl px-5 py-4 text-[#3D4047] placeholder-[#7A7D82] focus:outline-none focus:border-[#C4907C] focus:ring-4 focus:ring-[#C4907C]/10">
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-[#7A7D82] mb-2">Телефон</label>
                        <input type="tel" name="phone" placeholder="+7 (___) ___-__-__" required class="w-full bg-[#FAF7F2] border border-[#C4907C]/20 rounded-xl px-5 py-4 text-[#3D4047] placeholder-[#7A7D82] focus:outline-none focus:border-[#C4907C] focus:ring-4 focus:ring-[#C4907C]/10">
                    </div>
                    
                    <button type="submit" class="w-full bg-[#C4907C] hover:bg-[#B07D6A] text-white font-bold py-4 rounded-xl transition-all shadow-lg flex justify-center items-center gap-2">
                        <span>Отправить заявку</span>
                    </button>
                </form>
            </div>

            <!-- Калькулятор -->
            <div id="calculatorSection" class="bg-white rounded-3xl shadow-xl p-8 border border-[#C4907C]/10 mb-12">
                <h2 class="text-3xl font-extrabold text-[#3D4047] mb-6">Рассчитайте сумму</h2>
                
                <div id="creditCalculator">
                    <div class="space-y-6">
                        <!-- Выбор типа лица для калькулятора -->
                        <div>
                            <label class="block text-sm font-medium text-[#7A7D82] mb-2">Тип заемщика</label>
                            <select id="calcEntityType" class="w-full md:w-1/2 bg-[#FAF7F2] border border-[#C4907C]/20 rounded-xl px-5 py-3 text-[#3D4047] focus:outline-none focus:border-[#C4907C] focus:ring-4 focus:ring-[#C4907C]/10">
                                <option value="physical">Физическое лицо (ставка от 4.9%)</option>
                                <option value="legal">Юридическое лицо (ставка от 8.9%)</option>
                            </select>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-[#7A7D82] mb-2">Стоимость авто</label>
                            <input type="range" id="creditAmount" min="500000" max="100000000" step="100000" value="20000000" class="w-full h-2 bg-[#FAF7F2] rounded-lg appearance-none cursor-pointer accent-[#C4907C]">
                            <div class="flex justify-between text-sm text-[#7A7D82] mt-2">
                                <span>500 000 ₽</span>
                                <span id="creditAmountValue" class="font-bold text-[#C4907C]">20 000 000 ₽</span>
                                <span>100 000 000 ₽</span>
                            </div>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-[#7A7D82] mb-2">Срок кредита</label>
                            <input type="range" id="creditTerm" min="12" max="84" step="12" value="36" class="w-full h-2 bg-[#FAF7F2] rounded-lg appearance-none cursor-pointer accent-[#C4907C]">
                            <div class="flex justify-between text-sm text-[#7A7D82] mt-2">
                                <span>12 мес</span>
                                <span id="creditTermValue" class="font-bold text-[#C4907C]">36 мес</span>
                                <span>84 мес</span>
                            </div>
                        </div>
                        <div class="bg-[#FAF7F2] rounded-xl p-6 mt-6">
                            <div class="text-sm text-[#7A7D82] mb-2">Ежемесячный платеж</div>
                            <div id="creditMonthly" class="text-3xl font-extrabold text-[#C4907C]">0 ₽</div>
                        </div>
                    </div>
                </div>
                
                <div id="tradeInCalculator" class="hidden">
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-[#7A7D82] mb-2">Стоимость вашего авто</label>
                            <input type="range" id="tradeInCarPrice" min="100000" max="5000000" step="50000" value="1000000" class="w-full h-2 bg-[#FAF7F2] rounded-lg appearance-none cursor-pointer accent-[#C4907C]">
                            <div class="flex justify-between text-sm text-[#7A7D82] mt-2">
                                <span>100 000 ₽</span>
                                <span id="tradeInCarPriceValue" class="font-bold text-[#C4907C]">1 000 000 ₽</span>
                                <span>5 000 000 ₽</span>
                            </div>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-[#7A7D82] mb-2">Стоимость нового авто</label>
                            <input type="range" id="tradeInNewPrice" min="500000" max="10000000" step="100000" value="3000000" class="w-full h-2 bg-[#FAF7F2] rounded-lg appearance-none cursor-pointer accent-[#C4907C]">
                            <div class="flex justify-between text-sm text-[#7A7D82] mt-2">
                                <span>500 000 ₽</span>
                                <span id="tradeInNewPriceValue" class="font-bold text-[#C4907C]">3 000 000 ₽</span>
                                <span>10 000 000 ₽</span>
                            </div>
                        </div>
                        <div class="bg-[#FAF7F2] rounded-xl p-6 mt-6">
                            <div class="text-sm text-[#7A7D82] mb-2">Ваша выгода</div>
                            <div id="tradeInBenefit" class="text-3xl font-extrabold text-[#8BA89A]">+2 100 000 ₽</div>
                            <div class="text-xs text-[#7A7D82] mt-2">Разница с учетом оценки вашего авто</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Преимущества -->
            <div class="bg-white rounded-3xl shadow-xl p-8 border border-[#C4907C]/10 mb-12">
                <h2 class="text-3xl font-extrabold text-[#3D4047] mb-8 text-center">Почему это вам подойдет</h2>
                
                <div id="creditBenefits" class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="flex items-start space-x-4">
                        <div class="w-12 h-12 bg-[#8BA89A] rounded-full flex items-center justify-center flex-shrink-0">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                        </div>
                        <div><h3 class="font-bold text-[#3D4047] mb-2">Низкая ставка</h3><p class="text-sm text-[#7A7D82]">От 4.9% годовых для зарплатных клиентов</p></div>
                    </div>
                    <div class="flex items-start space-x-4">
                        <div class="w-12 h-12 bg-[#8BA89A] rounded-full flex items-center justify-center flex-shrink-0">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                        </div>
                        <div><h3 class="font-bold text-[#3D4047] mb-2">Без первоначального взноса</h3><p class="text-sm text-[#7A7D82]">Финансирование до 100% стоимости авто</p></div>
                    </div>
                    <div class="flex items-start space-x-4">
                        <div class="w-12 h-12 bg-[#8BA89A] rounded-full flex items-center justify-center flex-shrink-0">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                        </div>
                        <div><h3 class="font-bold text-[#3D4047] mb-2">Решение за 15 минут</h3><p class="text-sm text-[#7A7D82]">Онлайн-одобрение без визита в банк</p></div>
                    </div>
                    <div class="flex items-start space-x-4">
                        <div class="w-12 h-12 bg-[#8BA89A] rounded-full flex items-center justify-center flex-shrink-0">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                        </div>
                        <div><h3 class="font-bold text-[#3D4047] mb-2">Срок до 7 лет</h3><p class="text-sm text-[#7A7D82]">Гибкие условия погашения</p></div>
                    </div>
                </div>
                
                <div id="tradeInBenefits" class="hidden grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="flex items-start space-x-4">
                        <div class="w-12 h-12 bg-[#8BA89A] rounded-full flex items-center justify-center flex-shrink-0">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                        </div>
                        <div><h3 class="font-bold text-[#3D4047] mb-2">Быстрая оценка</h3><p class="text-sm text-[#7A7D82]">Узнайте стоимость вашего авто за 5 минут</p></div>
                    </div>
                    <div class="flex items-start space-x-4">
                        <div class="w-12 h-12 bg-[#8BA89A] rounded-full flex items-center justify-center flex-shrink-0">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                        </div>
                        <div><h3 class="font-bold text-[#3D4047] mb-2">Выгода до 15%</h3><p class="text-sm text-[#7A7D82]">По сравнению с обычной продажей</p></div>
                    </div>
                    <div class="flex items-start space-x-4">
                        <div class="w-12 h-12 bg-[#8BA89A] rounded-full flex items-center justify-center flex-shrink-0">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                        </div>
                        <div><h3 class="font-bold text-[#3D4047] mb-2">Безопасная сделка</h3><p class="text-sm text-[#7A7D82]">Все документы оформляем мы</p></div>
                    </div>
                    <div class="flex items-start space-x-4">
                        <div class="w-12 h-12 bg-[#8BA89A] rounded-full flex items-center justify-center flex-shrink-0">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                        </div>
                        <div><h3 class="font-bold text-[#3D4047] mb-2">Обмен на любое авто</h3><p class="text-sm text-[#7A7D82]">Выбирайте из нашего каталога</p></div>
                    </div>
                </div>
            </div>

            <!-- Примеры -->
            <div class="mb-12">
                <h2 class="text-3xl font-extrabold text-[#3D4047] mb-8 text-center">Примеры сделок</h2>
                <div id="creditExamples" class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    @foreach($creditExamples as $example)
                    <div class="bg-white rounded-2xl overflow-hidden shadow-lg border border-[#C4907C]/10">
                        @if($example->image)
                            <img src="{{ Storage::url($example->image) }}" class="w-full h-48 object-cover" alt="{{ $example->title }}">
                        @else
                            <div class="w-full h-48 bg-[#EEF1EB] flex items-center justify-center text-[#C4907C]/30">Нет фото</div>
                        @endif
                        <div class="p-6">
                            <h3 class="font-bold text-[#3D4047] mb-2">{{ $example->title }}</h3>
                            <p class="text-sm text-[#7A7D82]">{{ $example->description }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
                
                <div id="tradeInExamples" class="hidden grid grid-cols-1 md:grid-cols-3 gap-6">
                    @foreach($tradeInExamples as $example)
                    <div class="bg-white rounded-2xl overflow-hidden shadow-lg border border-[#C4907C]/10">
                        @if($example->image)
                            <img src="{{ Storage::url($example->image) }}" class="w-full h-48 object-cover" alt="{{ $example->title }}">
                        @else
                            <div class="w-full h-48 bg-[#EEF1EB] flex items-center justify-center text-[#C4907C]/30">Нет фото</div>
                        @endif
                        <div class="p-6">
                            <h3 class="font-bold text-[#3D4047] mb-2">{{ $example->title }}</h3>
                            <p class="text-sm text-[#7A7D82]">{{ $example->description }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            <!-- Отзывы -->
            <div class="bg-[#EEF1EB] rounded-3xl p-8">
                <h2 class="text-3xl font-extrabold text-[#3D4047] mb-8 text-center">Отзывы клиентов</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    @foreach($reviews as $review)
                    <div class="bg-white rounded-2xl p-6 shadow-lg">
                        <div class="flex items-center mb-4">
                            <div class="w-12 h-12 bg-[#C4907C]/20 rounded-full flex items-center justify-center mr-4">
                                <span class="text-[#C4907C] font-bold">{{ substr($review->client_name, 0, 1) }}</span>
                            </div>
                            <div>
                                <div class="font-bold text-[#3D4047]">{{ $review->client_name }}</div>
                                <div class="text-sm text-[#7A7D82]">{{ $review->car_model }}</div>
                            </div>
                        </div>
                        <p class="text-[#3D4047]/70 italic">"{{ $review->text }}"</p>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-[#4A5D6B] py-12 px-4 sm:px-6 lg:px-8 mt-16">
        <div class="max-w-7xl mx-auto">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 text-white">
                <div>
                    <span class="text-xl font-extrabold">Avto<span class="text-[#C4907C]">Blog</span></span>
                    <p class="text-white/50 text-sm mt-2">Сервис продажи и обмена авто</p>
                </div>
                <div>
                    <h3 class="font-bold mb-3">Контакты</h3>
                    <p class="text-[#C4907C] text-xl font-extrabold">8-800-123-45-67</p>
                    <p class="text-white/50 text-sm mt-2">offer@avtoblog.ru</p>
                    <p class="text-white/50 text-sm mt-1">г. Москва, ул. Примерная, 123</p>
                </div>
                <div>
                    <h3 class="font-bold mb-3">Навигация</h3>
                    <ul class="space-y-2 text-sm text-white/50">
                        <li><a href="/" class="hover:text-[#C4907C]">Главная</a></li>
                        <li><a href="/credit-trade-in" class="hover:text-[#C4907C]">Кредит / Trade-In</a></li>
                        <li><a href="/reviews" class="hover:text-[#C4907C]">Отзывы</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>

    <!-- ================= МОДАЛЬНЫЕ ОКНА ================= -->

    <!-- 1. Модалка "Оставить заявку" (из шапки) -->
    <div id="leadModal" class="fixed inset-0 z-50 hidden">
        <div class="absolute inset-0 modal-backdrop" onclick="closeLeadModal()"></div>
        <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 bg-white rounded-3xl shadow-2xl p-8 w-full max-w-lg border border-[#C4907C]/10">
            <button onclick="closeLeadModal()" class="absolute top-4 right-4 text-[#7A7D82] hover:text-[#3D4047]">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
            </button>
            <h2 class="text-2xl font-extrabold text-[#3D4047] mb-6">Оставить заявку</h2>
            
            <form class="lead-form-ajax space-y-4" data-type="general">
                @csrf
                <input type="hidden" name="service_type" value="general">
                
                <div>
                    <label class="block text-sm font-medium text-[#7A7D82] mb-2">Тип лица</label>
                    <select name="entity_type" class="w-full bg-[#FAF7F2] border border-[#C4907C]/20 rounded-xl px-5 py-4 text-[#3D4047] focus:outline-none focus:border-[#C4907C] focus:ring-4 focus:ring-[#C4907C]/10">
                        <option value="physical">Физическое лицо</option>
                        <option value="legal">Юридическое лицо</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-[#7A7D82] mb-2">Имя</label>
                    <input type="text" name="name" placeholder="Ваше имя" class="w-full bg-[#FAF7F2] border border-[#C4907C]/20 rounded-xl px-5 py-4 text-[#3D4047] placeholder-[#7A7D82] focus:outline-none focus:border-[#C4907C] focus:ring-4 focus:ring-[#C4907C]/10">
                </div>
                <div>
                    <label class="block text-sm font-medium text-[#7A7D82] mb-2">Телефон</label>
                    <input type="tel" name="phone" placeholder="+7 (___) ___-__-__" required class="w-full bg-[#FAF7F2] border border-[#C4907C]/20 rounded-xl px-5 py-4 text-[#3D4047] placeholder-[#7A7D82] focus:outline-none focus:border-[#C4907C] focus:ring-4 focus:ring-[#C4907C]/10">
                </div>
                
                <button type="submit" class="w-full bg-[#C4907C] hover:bg-[#B07D6A] text-white font-bold py-4 rounded-xl transition-all shadow-lg flex justify-center items-center gap-2">
                    <span>Отправить заявку</span>
                </button>
            </form>
        </div>
    </div>

    <!-- 2. Модалка "Успешная отправка" -->
    <div id="successModal" class="fixed inset-0 z-50 hidden">
        <div class="absolute inset-0 modal-backdrop"></div>
        <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 bg-white rounded-3xl shadow-2xl p-8 w-full max-w-md border border-[#8BA89A]/30 text-center">
            <div class="w-16 h-16 bg-[#8BA89A] rounded-full flex items-center justify-center mx-auto mb-4">
                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path></svg>
            </div>
            <h2 class="text-2xl font-extrabold text-[#3D4047] mb-2">Заявка отправлена!</h2>
            <p class="text-[#7A7D82] mb-6">Наш менеджер свяжется с вами в ближайшее время для уточнения деталей.</p>
            <button onclick="closeSuccessModal()" class="w-full bg-[#4A5D6B] hover:bg-[#3D4F5C] text-white font-bold py-3 rounded-xl transition-all">
                Отлично, спасибо!
            </button>
        </div>
    </div>

    <script>
        // Мобильное меню
        document.getElementById('menuBtn').addEventListener('click', function() {
            document.getElementById('mobileMenu').classList.toggle('hidden');
        });
        
        // Переключение табов
        const creditTab = document.getElementById('creditTab');
        const tradeInTab = document.getElementById('tradeInTab');
        const creditCalculator = document.getElementById('creditCalculator');
        const tradeInCalculator = document.getElementById('tradeInCalculator');
        const creditBenefits = document.getElementById('creditBenefits');
        const tradeInBenefits = document.getElementById('tradeInBenefits');
        const creditExamples = document.getElementById('creditExamples');
        const tradeInExamples = document.getElementById('tradeInExamples');
        
        creditTab.addEventListener('click', function() {
            creditTab.classList.add('bg-[#C4907C]', 'text-white');
            creditTab.classList.remove('text-[#3D4047]', 'hover:bg-[#FAF7F2]');
            tradeInTab.classList.remove('bg-[#C4907C]', 'text-white');
            tradeInTab.classList.add('text-[#3D4047]', 'hover:bg-[#FAF7F2]');
            creditCalculator.classList.remove('hidden');
            tradeInCalculator.classList.add('hidden');
            creditBenefits.classList.remove('hidden');
            tradeInBenefits.classList.add('hidden');
            creditExamples.classList.remove('hidden');
            tradeInExamples.classList.add('hidden');
        });
        
        tradeInTab.addEventListener('click', function() {
            tradeInTab.classList.add('bg-[#C4907C]', 'text-white');
            tradeInTab.classList.remove('text-[#3D4047]', 'hover:bg-[#FAF7F2]');
            creditTab.classList.remove('bg-[#C4907C]', 'text-white');
            creditTab.classList.add('text-[#3D4047]', 'hover:bg-[#FAF7F2]');
            tradeInCalculator.classList.remove('hidden');
            creditCalculator.classList.add('hidden');
            tradeInBenefits.classList.remove('hidden');
            creditBenefits.classList.add('hidden');
            tradeInExamples.classList.remove('hidden');
            creditExamples.classList.add('hidden');
        });
        
        function formatNumber(num) { return num.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ' ') + ' ₽'; }
        
        // Калькулятор кредита с учетом типа лица
        const calcEntityType = document.getElementById('calcEntityType');
        const creditAmount = document.getElementById('creditAmount');
        const creditTerm = document.getElementById('creditTerm');
        const creditAmountValue = document.getElementById('creditAmountValue');
        const creditTermValue = document.getElementById('creditTermValue');
        const creditMonthly = document.getElementById('creditMonthly');
        
        function calculateCredit() {
            const amount = parseInt(creditAmount.value);
            const term = parseInt(creditTerm.value);
            
            // Ставка зависит от типа лица: Физ = 4.9%, Юр = 8.9%
            const entityType = calcEntityType.value;
            const rate = entityType === 'legal' ? (0.089 / 12) : (0.049 / 12);
            
            const monthly = (amount * rate * Math.pow(1 + rate, term)) / (Math.pow(1 + rate, term) - 1);
            
            creditAmountValue.textContent = formatNumber(amount);
            creditTermValue.textContent = term + ' мес';
            creditMonthly.textContent = formatNumber(Math.round(monthly));
        }
        
        calcEntityType.addEventListener('change', calculateCredit);
        creditAmount.addEventListener('input', calculateCredit);
        creditTerm.addEventListener('input', calculateCredit);
        calculateCredit(); // Инициализация
        
        // Калькулятор Trade-In
        const tradeInCarPrice = document.getElementById('tradeInCarPrice');
        const tradeInNewPrice = document.getElementById('tradeInNewPrice');
        const tradeInCarPriceValue = document.getElementById('tradeInCarPriceValue');
        const tradeInNewPriceValue = document.getElementById('tradeInNewPriceValue');
        const tradeInBenefit = document.getElementById('tradeInBenefit');
        
        function calculateTradeIn() {
            const carPrice = parseInt(tradeInCarPrice.value);
            const newPrice = parseInt(tradeInNewPrice.value);
            const benefit = newPrice - (carPrice * 0.9);
            tradeInCarPriceValue.textContent = formatNumber(carPrice);
            tradeInNewPriceValue.textContent = formatNumber(newPrice);
            tradeInBenefit.textContent = '+' + formatNumber(Math.round(benefit));
        }
        tradeInCarPrice.addEventListener('input', calculateTradeIn);
        tradeInNewPrice.addEventListener('input', calculateTradeIn);
        calculateTradeIn();

        // ================= ЛОГИКА МОДАЛЬНЫХ ОКОН =================
        
        function openLeadModal() {
            document.getElementById('leadModal').classList.remove('hidden');
            document.body.style.overflow = 'hidden'; // Блокируем скролл фона
        }
        
        function closeLeadModal() {
            document.getElementById('leadModal').classList.add('hidden');
            document.body.style.overflow = '';
        }

        function showSuccessModal() {
            closeLeadModal(); // Закрываем форму, если она была открыта
            document.getElementById('successModal').classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }

        function closeSuccessModal() {
            document.getElementById('successModal').classList.add('hidden');
            document.body.style.overflow = '';
        }

                // AJAX отправка форм без перезагрузки страницы
        document.querySelectorAll('.lead-form-ajax').forEach(form => {
            form.addEventListener('submit', function(e) {
                e.preventDefault();
                
                const formData = new FormData(this);
                const submitBtn = this.querySelector('button[type="submit"]');
                const originalBtnText = submitBtn.innerHTML;
                
                // Анимация загрузки
                submitBtn.disabled = true;
                submitBtn.innerHTML = '<svg class="animate-spin h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg> Отправка...';
                
                fetch('{{ route("leads.store") }}', {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                        'Accept': 'application/json' // Важно: говорим Laravel, что ждем JSON
                    }
                })
                .then(async response => {
                    // ПРОВЕРКА: действительно ли сервер вернул JSON?
                    const contentType = response.headers.get("content-type");
                    if (contentType && contentType.indexOf("application/json") !== -1) {
                        return response.json();
                    } else {
                        // Если пришел HTML (например, ошибка 419 или 500), читаем как текст
                        const errorText = await response.text();
                        console.error("Сервер вернул HTML вместо JSON. Текст ошибки:", errorText);
                        throw new Error("Сервер вернул ошибку. Проверьте консоль разработчика (F12).");
                    }
                })
                .then(data => {
                    if (data.success) {
                        form.reset(); // Очищаем форму
                        showSuccessModal(); // Показываем красивое окошко
                    } else {
                        // Показываем ошибки валидации, если они есть
                        let errorMsg = data.message || "Проверьте правильность заполнения полей.";
                        if (data.errors) {
                            errorMsg = Object.values(data.errors).flat().join('\n');
                        }
                        alert(errorMsg);
                    }
                })
                .catch(error => {
                    console.error('Ошибка отправки:', error);
                    alert("Произошла ошибка при отправке. Попробуйте обновить страницу.");
                })
                .finally(() => {
                    submitBtn.disabled = false;
                    submitBtn.innerHTML = originalBtnText;
                });
            });
        });
    </script>
    <x-chatbot-widget />
</body>
</html>
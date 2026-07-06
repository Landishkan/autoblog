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
    </style>
</head>
<body class="bg-[#FBF7F0]">

    <!-- Header (такой же как на главной) -->
    <header class="bg-white shadow-sm sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <a href="/" class="text-2xl font-extrabold text-[#2C1810]">
                    <span class="text-[#C8963E]">LOGO</span>
                </a>
                
                <nav class="hidden lg:flex items-center space-x-8">
                    <a href="/" class="text-[#2C1810] hover:text-[#C8963E] transition-colors text-sm font-medium">Главная</a>
                    <a href="/credit-trade-in" class="text-[#C8963E] font-bold text-sm">Кредит / Trade-In</a>
                    <a href="/chatbot" class="text-[#2C1810] hover:text-[#C8963E] transition-colors text-sm font-medium">Чат-бот</a>
                    <a href="/reviews" class="text-[#2C1810] hover:text-[#C8963E] transition-colors text-sm font-medium">Отзывы</a>
                </nav>
                
                <div class="flex items-center space-x-4">
                    <a href="tel:88001234567" class="hidden md:block text-[#2C1810] font-bold text-lg">
                        8-800-123-45-67
                    </a>
                    <a href="#lead-form" class="hidden lg:inline-flex bg-[#C8963E] hover:bg-[#B8860B] text-white font-bold px-5 py-2 rounded-lg text-sm transition-all">
                        Оставить заявку
                    </a>
                    <button id="menuBtn" class="lg:hidden p-2 rounded-lg hover:bg-[#FBF7F0]">
                        <svg class="w-6 h-6 text-[#2C1810]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
        
        <div id="mobileMenu" class="hidden lg:hidden bg-white border-t border-gray-200">
            <div class="px-4 py-4 space-y-3">
                <a href="/" class="block text-[#2C1810] hover:text-[#C8963E] font-medium">Главная</a>
                <a href="/credit-trade-in" class="block text-[#C8963E] font-bold">Кредит / Trade-In</a>
                <a href="/chatbot" class="block text-[#2C1810] hover:text-[#C8963E] font-medium">Чат-бот</a>
                <a href="/reviews" class="block text-[#2C1810] hover:text-[#C8963E] font-medium">Отзывы</a>
                <a href="#lead-form" class="block bg-[#C8963E] text-white text-center py-3 rounded-xl font-bold">Оставить заявку</a>
            </div>
        </div>
    </header>

    <!-- Переключатель Кредит / Trade-In -->
    <section class="py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-4xl mx-auto">
            <div class="bg-white rounded-2xl shadow-lg p-2 inline-flex w-full mb-8">
                <button id="creditTab" class="flex-1 py-3 px-6 rounded-xl font-bold text-sm transition-all bg-[#C8963E] text-white">
                    Кредит
                </button>
                <button id="tradeInTab" class="flex-1 py-3 px-6 rounded-xl font-bold text-sm transition-all text-[#2C1810] hover:bg-[#FBF7F0]">
                    Trade-In
                </button>
            </div>

            <!-- Форма заявки -->
            <div id="lead-form" class="bg-white rounded-3xl shadow-xl p-8 border border-[#C8963E]/10 mb-12">
                <h2 class="text-3xl font-extrabold text-[#2C1810] mb-6">Оставьте заявку</h2>
                
                <form action="{{ route('leads.store') }}" method="POST" class="space-y-4">
                    @csrf
                    <input type="hidden" name="service_type" id="serviceTypeInput" value="credit">
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-[#2C1810]/70 mb-2">Имя</label>
                            <input type="text" name="name" placeholder="Ваше имя" 
                                class="w-full bg-[#FBF7F0] border border-[#C8963E]/20 rounded-xl px-5 py-4 text-[#2C1810] placeholder-[#2C1810]/40 focus:outline-none focus:border-[#C8963E] focus:ring-4 focus:ring-[#C8963E]/10">
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-[#2C1810]/70 mb-2">Телефон</label>
                            <input type="tel" name="phone" placeholder="+7 (___) ___-__-__" required
                                class="w-full bg-[#FBF7F0] border border-[#C8963E]/20 rounded-xl px-5 py-4 text-[#2C1810] placeholder-[#2C1810]/40 focus:outline-none focus:border-[#C8963E] focus:ring-4 focus:ring-[#C8963E]/10">
                        </div>
                    </div>
                    
                    <button type="submit" class="w-full bg-[#C8963E] hover:bg-[#B8860B] text-white font-bold py-4 rounded-xl transition-all shadow-lg">
                        Отправить заявку
                    </button>
                </form>
            </div>

            <!-- Калькулятор -->
            <div id="calculatorSection" class="bg-white rounded-3xl shadow-xl p-8 border border-[#C8963E]/10 mb-12">
                <h2 class="text-3xl font-extrabold text-[#2C1810] mb-6">Рассчитайте сумму</h2>
                
                <div id="creditCalculator">
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-[#2C1810]/70 mb-2">Стоимость авто</label>
                            <input type="range" id="creditAmount" min="500000" max="10000000" step="100000" value="2000000" 
                                class="w-full h-2 bg-[#FBF7F0] rounded-lg appearance-none cursor-pointer">
                            <div class="flex justify-between text-sm text-[#2C1810]/60 mt-2">
                                <span>500 000 ₽</span>
                                <span id="creditAmountValue" class="font-bold text-[#C8963E]">2 000 000 ₽</span>
                                <span>10 000 000 ₽</span>
                            </div>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-[#2C1810]/70 mb-2">Срок кредита</label>
                            <input type="range" id="creditTerm" min="12" max="84" step="12" value="36" 
                                class="w-full h-2 bg-[#FBF7F0] rounded-lg appearance-none cursor-pointer">
                            <div class="flex justify-between text-sm text-[#2C1810]/60 mt-2">
                                <span>12 мес</span>
                                <span id="creditTermValue" class="font-bold text-[#C8963E]">36 мес</span>
                                <span>84 мес</span>
                            </div>
                        </div>
                        
                                                <div class="bg-[#FBF7F0] rounded-xl p-6 mt-6">
                            <div class="text-sm text-[#2C1810]/60 mb-2">Ежемесячный платеж</div>
                            <div id="creditMonthly" class="text-3xl font-extrabold text-[#C8963E]">45 000 ₽</div>
                        </div>
                    </div>
                </div>
                
                <div id="tradeInCalculator" class="hidden">
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-[#2C1810]/70 mb-2">Стоимость вашего авто</label>
                            <input type="range" id="tradeInCarPrice" min="100000" max="5000000" step="50000" value="1000000" 
                                class="w-full h-2 bg-[#FBF7F0] rounded-lg appearance-none cursor-pointer">
                            <div class="flex justify-between text-sm text-[#2C1810]/60 mt-2">
                                <span>100 000 ₽</span>
                                <span id="tradeInCarPriceValue" class="font-bold text-[#C8963E]">1 000 000 ₽</span>
                                <span>5 000 000 ₽</span>
                            </div>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-[#2C1810]/70 mb-2">Стоимость нового авто</label>
                            <input type="range" id="tradeInNewPrice" min="500000" max="10000000" step="100000" value="3000000" 
                                class="w-full h-2 bg-[#FBF7F0] rounded-lg appearance-none cursor-pointer">
                            <div class="flex justify-between text-sm text-[#2C1810]/60 mt-2">
                                <span>500 000 ₽</span>
                                <span id="tradeInNewPriceValue" class="font-bold text-[#C8963E]">3 000 000 ₽</span>
                                <span>10 000 000 ₽</span>
                            </div>
                        </div>
                        
                        <div class="bg-[#FBF7F0] rounded-xl p-6 mt-6">
                            <div class="text-sm text-[#2C1810]/60 mb-2">Ваша выгода</div>
                            <div id="tradeInBenefit" class="text-3xl font-extrabold text-[#0D7377]">+2 100 000 ₽</div>
                            <div class="text-xs text-[#2C1810]/50 mt-2">Разница с учетом оценки вашего авто</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Почему этот способ -->
            <div class="bg-white rounded-3xl shadow-xl p-8 border border-[#C8963E]/10 mb-12">
                <h2 class="text-3xl font-extrabold text-[#2C1810] mb-8 text-center">Почему это вам подойдет</h2>
                
                <div id="creditBenefits" class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="flex items-start space-x-4">
                        <div class="w-12 h-12 bg-[#0D7377] rounded-full flex items-center justify-center flex-shrink-0">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-bold text-[#2C1810] mb-2">Низкая ставка</h3>
                            <p class="text-sm text-[#2C1810]/60">От 4.9% годовых для зарплатных клиентов</p>
                        </div>
                    </div>
                    <div class="flex items-start space-x-4">
                        <div class="w-12 h-12 bg-[#0D7377] rounded-full flex items-center justify-center flex-shrink-0">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-bold text-[#2C1810] mb-2">Без первоначального взноса</h3>
                            <p class="text-sm text-[#2C1810]/60">Финансирование до 100% стоимости авто</p>
                        </div>
                    </div>
                    <div class="flex items-start space-x-4">
                        <div class="w-12 h-12 bg-[#0D7377] rounded-full flex items-center justify-center flex-shrink-0">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-bold text-[#2C1810] mb-2">Решение за 15 минут</h3>
                            <p class="text-sm text-[#2C1810]/60">Онлайн-одобрение без визита в банк</p>
                        </div>
                    </div>
                    <div class="flex items-start space-x-4">
                        <div class="w-12 h-12 bg-[#0D7377] rounded-full flex items-center justify-center flex-shrink-0">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-bold text-[#2C1810] mb-2">Срок до 7 лет</h3>
                            <p class="text-sm text-[#2C1810]/60">Гибкие условия погашения</p>
                        </div>
                    </div>
                </div>
                
                <div id="tradeInBenefits" class="hidden grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="flex items-start space-x-4">
                        <div class="w-12 h-12 bg-[#0D7377] rounded-full flex items-center justify-center flex-shrink-0">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-bold text-[#2C1810] mb-2">Быстрая оценка</h3>
                            <p class="text-sm text-[#2C1810]/60">Узнайте стоимость вашего авто за 5 минут</p>
                        </div>
                    </div>
                    <div class="flex items-start space-x-4">
                        <div class="w-12 h-12 bg-[#0D7377] rounded-full flex items-center justify-center flex-shrink-0">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-bold text-[#2C1810] mb-2">Выгода до 15%</h3>
                            <p class="text-sm text-[#2C1810]/60">По сравнению с обычной продажей</p>
                        </div>
                    </div>
                    <div class="flex items-start space-x-4">
                        <div class="w-12 h-12 bg-[#0D7377] rounded-full flex items-center justify-center flex-shrink-0">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-bold text-[#2C1810] mb-2">Безопасная сделка</h3>
                            <p class="text-sm text-[#2C1810]/60">Все документы оформляем мы</p>
                        </div>
                    </div>
                    <div class="flex items-start space-x-4">
                        <div class="w-12 h-12 bg-[#0D7377] rounded-full flex items-center justify-center flex-shrink-0">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-bold text-[#2C1810] mb-2">Обмен на любое авто</h3>
                            <p class="text-sm text-[#2C1810]/60">Выбирайте из нашего каталога</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Примеры -->
            <div class="mb-12">
                <h2 class="text-3xl font-extrabold text-[#2C1810] mb-8 text-center">Примеры сделок</h2>
                
                <div id="creditExamples" class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    @foreach($creditExamples as $example)
                    <div class="bg-white rounded-2xl overflow-hidden shadow-lg border border-[#C8963E]/10">
                        @if($example->image)
                            <img src="{{ Storage::url($example->image) }}" class="w-full h-48 object-cover" alt="{{ $example->title }}">
                        @else
                            <div class="w-full h-48 bg-[#F5EDE3] flex items-center justify-center text-[#C8963E]/30">Нет фото</div>
                        @endif
                        <div class="p-6">
                            <h3 class="font-bold text-[#2C1810] mb-2">{{ $example->title }}</h3>
                            <p class="text-sm text-[#2C1810]/60">{{ $example->description }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
                
                <div id="tradeInExamples" class="hidden grid grid-cols-1 md:grid-cols-3 gap-6">
                    @foreach($tradeInExamples as $example)
                    <div class="bg-white rounded-2xl overflow-hidden shadow-lg border border-[#C8963E]/10">
                        @if($example->image)
                            <img src="{{ Storage::url($example->image) }}" class="w-full h-48 object-cover" alt="{{ $example->title }}">
                        @else
                            <div class="w-full h-48 bg-[#F5EDE3] flex items-center justify-center text-[#C8963E]/30">Нет фото</div>
                        @endif
                        <div class="p-6">
                            <h3 class="font-bold text-[#2C1810] mb-2">{{ $example->title }}</h3>
                            <p class="text-sm text-[#2C1810]/60">{{ $example->description }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            <!-- Отзывы -->
            <div class="bg-[#F5EDE3] rounded-3xl p-8">
                <h2 class="text-3xl font-extrabold text-[#2C1810] mb-8 text-center">Отзывы клиентов</h2>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    @foreach($reviews as $review)
                    <div class="bg-white rounded-2xl p-6 shadow-lg">
                        <div class="flex items-center mb-4">
                            <div class="w-12 h-12 bg-[#C8963E]/20 rounded-full flex items-center justify-center mr-4">
                                <span class="text-[#C8963E] font-bold">{{ substr($review->client_name, 0, 1) }}</span>
                            </div>
                            <div>
                                <div class="font-bold text-[#2C1810]">{{ $review->client_name }}</div>
                                <div class="text-sm text-[#2C1810]/50">{{ $review->car_model }}</div>
                            </div>
                        </div>
                        <p class="text-[#2C1810]/70 italic">"{{ $review->text }}"</p>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-[#2C1810] py-12 px-4 sm:px-6 lg:px-8 mt-16">
        <div class="max-w-7xl mx-auto">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 text-white">
                <div>
                    <span class="text-xl font-extrabold">LOGO</span>
                    <p class="text-white/50 text-sm mt-2">Сервис продажи и обмена авто</p>
                </div>
                <div>
                    <h3 class="font-bold mb-3">Контакты</h3>
                    <p class="text-[#C8963E] text-xl font-extrabold">8-800-123-45-67</p>
                    <p class="text-white/50 text-sm mt-2">offer@avtoblog.ru</p>
                    <p class="text-white/50 text-sm mt-1">г. Москва, ул. Примерная, 123</p>
                </div>
                <div>
                    <h3 class="font-bold mb-3">Навигация</h3>
                    <ul class="space-y-2 text-sm text-white/50">
                        <li><a href="/" class="hover:text-[#C8963E]">Главная</a></li>
                        <li><a href="/credit-trade-in" class="hover:text-[#C8963E]">Кредит / Trade-In</a></li>
                        <li><a href="/reviews" class="hover:text-[#C8963E]">Отзывы</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>

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
        const serviceTypeInput = document.getElementById('serviceTypeInput');
        
        creditTab.addEventListener('click', function() {
            creditTab.classList.add('bg-[#C8963E]', 'text-white');
            creditTab.classList.remove('text-[#2C1810]', 'hover:bg-[#FBF7F0]');
            
            tradeInTab.classList.remove('bg-[#C8963E]', 'text-white');
            tradeInTab.classList.add('text-[#2C1810]', 'hover:bg-[#FBF7F0]');
            
            creditCalculator.classList.remove('hidden');
            tradeInCalculator.classList.add('hidden');
            creditBenefits.classList.remove('hidden');
            tradeInBenefits.classList.add('hidden');
            creditExamples.classList.remove('hidden');
            tradeInExamples.classList.add('hidden');
            serviceTypeInput.value = 'credit';
        });
        
        tradeInTab.addEventListener('click', function() {
            tradeInTab.classList.add('bg-[#C8963E]', 'text-white');
            tradeInTab.classList.remove('text-[#2C1810]', 'hover:bg-[#FBF7F0]');
            
            creditTab.classList.remove('bg-[#C8963E]', 'text-white');
            creditTab.classList.add('text-[#2C1810]', 'hover:bg-[#FBF7F0]');
            
            tradeInCalculator.classList.remove('hidden');
            creditCalculator.classList.add('hidden');
            tradeInBenefits.classList.remove('hidden');
            creditBenefits.classList.add('hidden');
            tradeInExamples.classList.remove('hidden');
            creditExamples.classList.add('hidden');
            serviceTypeInput.value = 'trade-in';
        });
        
        // Калькулятор кредита
        const creditAmount = document.getElementById('creditAmount');
        const creditTerm = document.getElementById('creditTerm');
        const creditAmountValue = document.getElementById('creditAmountValue');
        const creditTermValue = document.getElementById('creditTermValue');
        const creditMonthly = document.getElementById('creditMonthly');
        
        function formatNumber(num) {
            return num.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ' ') + ' ₽';
        }
        
        function calculateCredit() {
            const amount = parseInt(creditAmount.value);
            const term = parseInt(creditTerm.value);
            const rate = 0.049 / 12; // 4.9% годовых
            
            const monthly = (amount * rate * Math.pow(1 + rate, term)) / (Math.pow(1 + rate, term) - 1);
            
            creditAmountValue.textContent = formatNumber(amount);
            creditTermValue.textContent = term + ' мес';
            creditMonthly.textContent = formatNumber(Math.round(monthly));
        }
        
        creditAmount.addEventListener('input', calculateCredit);
        creditTerm.addEventListener('input', calculateCredit);
        calculateCredit();
        
        // Калькулятор Trade-In
        const tradeInCarPrice = document.getElementById('tradeInCarPrice');
        const tradeInNewPrice = document.getElementById('tradeInNewPrice');
        const tradeInCarPriceValue = document.getElementById('tradeInCarPriceValue');
        const tradeInNewPriceValue = document.getElementById('tradeInNewPriceValue');
        const tradeInBenefit = document.getElementById('tradeInBenefit');
        
        function calculateTradeIn() {
            const carPrice = parseInt(tradeInCarPrice.value);
            const newPrice = parseInt(tradeInNewPrice.value);
            const benefit = newPrice - (carPrice * 0.9); // Выгода 10% от оценки
            
            tradeInCarPriceValue.textContent = formatNumber(carPrice);
            tradeInNewPriceValue.textContent = formatNumber(newPrice);
            tradeInBenefit.textContent = '+' + formatNumber(Math.round(benefit));
        }
        
        tradeInCarPrice.addEventListener('input', calculateTradeIn);
        tradeInNewPrice.addEventListener('input', calculateTradeIn);
        calculateTradeIn();
    </script>
</body>
</html>
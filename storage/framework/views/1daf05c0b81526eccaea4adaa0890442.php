<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Чат-бот - AvtoBlog</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        * { font-family: 'Manrope', sans-serif; }
        
        .chat-container {
            height: calc(100vh - 200px);
            min-height: 500px;
        }
        
        .message {
            animation: fadeIn 0.3s ease-in;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        .typing-indicator {
            display: inline-flex;
            gap: 4px;
        }
        
        .typing-indicator span {
            width: 8px;
            height: 8px;
            background: #C4907C; /* Новый акцентный цвет */
            border-radius: 50%;
            animation: bounce 1.4s infinite ease-in-out;
        }
        
        .typing-indicator span:nth-child(1) { animation-delay: -0.32s; }
        .typing-indicator span:nth-child(2) { animation-delay: -0.16s; }
        
        @keyframes bounce {
            0%, 80%, 100% { transform: scale(0); }
            40% { transform: scale(1); }
        }
    </style>
</head>
<body class="bg-[#FAF7F2]">

    <!-- Header -->
    <header class="bg-[#4A5D6B] shadow-sm sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <a href="/" class="text-2xl font-extrabold text-white">
                    Avto<span class="text-[#C4907C]">Blog</span>
                </a>
                
                <nav class="hidden lg:flex items-center space-x-8">
                    <a href="/" class="text-white/70 hover:text-[#C4907C] transition-colors text-sm font-medium">Главная</a>
                    <a href="/credit-trade-in" class="text-white/70 hover:text-[#C4907C] transition-colors text-sm font-medium">Кредит / Trade-In</a>
                    <a href="/chatbot" class="text-[#C4907C] font-bold text-sm">Чат-бот</a>
                    <a href="/reviews" class="text-white/70 hover:text-[#C4907C] transition-colors text-sm font-medium">Отзывы</a>
                </nav>
                
                <div class="flex items-center space-x-4">
                    <a href="tel:88001234567" class="hidden md:block text-white font-bold text-lg">8-800-123-45-67</a>
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
                <a href="/credit-trade-in" class="block text-white/70 hover:text-[#C4907C] font-medium">Кредит / Trade-In</a>
                <a href="/chatbot" class="block text-[#C4907C] font-bold">Чат-бот</a>
                <a href="/reviews" class="block text-white/70 hover:text-[#C4907C] font-medium">Отзывы</a>
            </div>
        </div>
    </header>

    <!-- Chat Container -->
    <section class="py-8 px-4 sm:px-6 lg:px-8">
        <div class="max-w-4xl mx-auto">
            <div class="bg-white rounded-3xl shadow-xl overflow-hidden border border-[#C4907C]/10">
                
                <!-- Chat Header -->
                <div class="bg-gradient-to-r from-[#4A5D6B] to-[#3D4F5C] p-6 text-white">
                    <div class="flex items-center space-x-4">
                        <div class="w-12 h-12 bg-[#8BA89A] rounded-full flex items-center justify-center">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                        <div>
                            <h1 class="text-xl font-bold">AI-Ассистент AvtoBlog</h1>
                            <p class="text-sm text-white/60">Задайте любой вопрос о наших услугах</p>
                        </div>
                    </div>
                </div>
                
                <!-- Chat Messages -->
                <div id="chatMessages" class="chat-container overflow-y-auto p-6 space-y-4 bg-[#FAF7F2]">
                    
                    <!-- Welcome Message -->
                    <div class="message flex items-start space-x-3">
                        <div class="w-10 h-10 bg-[#8BA89A] rounded-full flex items-center justify-center flex-shrink-0">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                        <div class="bg-white rounded-2xl rounded-tl-none p-4 shadow-sm max-w-md border border-[#C4907C]/5">
                            <p class="text-[#3D4047]">Привет!  Я AI-ассистент AvtoBlog. Чем могу помочь?</p>
                            <p class="text-xs text-[#7A7D82] mt-2">Только что</p>
                        </div>
                    </div>
                    
                    <!-- Quick Actions -->
                    <div class="message flex items-start space-x-3">
                        <div class="w-10 h-10 bg-[#8BA89A] rounded-full flex items-center justify-center flex-shrink-0">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                        <div class="bg-white rounded-2xl rounded-tl-none p-4 shadow-sm border border-[#C4907C]/5">
                            <p class="text-[#3D4047] mb-3">Выберите тему:</p>
                            <div class="flex flex-wrap gap-2">
                                <button onclick="sendQuickMessage('Как продать авто?')" class="bg-[#FAF7F2] hover:bg-[#C4907C] hover:text-white text-[#3D4047] px-4 py-2 rounded-xl text-sm font-medium transition-all border border-[#C4907C]/10">
                                     Продать авто
                                </button>
                                <button onclick="sendQuickMessage('Расскажите о Trade-In')" class="bg-[#FAF7F2] hover:bg-[#C4907C] hover:text-white text-[#3D4047] px-4 py-2 rounded-xl text-sm font-medium transition-all border border-[#C4907C]/10">
                                     Trade-In
                                </button>
                                <button onclick="sendQuickMessage('Как оформить кредит?')" class="bg-[#FAF7F2] hover:bg-[#C4907C] hover:text-white text-[#3D4047] px-4 py-2 rounded-xl text-sm font-medium transition-all border border-[#C4907C]/10">
                                     Кредит
                                </button>
                                <button onclick="sendQuickMessage('Контакты')" class="bg-[#FAF7F2] hover:bg-[#C4907C] hover:text-white text-[#3D4047] px-4 py-2 rounded-xl text-sm font-medium transition-all border border-[#C4907C]/10">
                                     Контакты
                                </button>
                            </div>
                        </div>
                    </div>
                    
                </div>
                
                <!-- Chat Input -->
                <div class="border-t border-[#C4907C]/10 p-4 bg-white">
                    <form id="chatForm" class="flex items-center space-x-3">
                        <input 
                            type="text" 
                            id="messageInput" 
                            placeholder="Напишите сообщение..." 
                            class="flex-1 bg-[#FAF7F2] border border-[#C4907C]/20 rounded-xl px-5 py-3 text-[#3D4047] placeholder-[#7A7D82] focus:outline-none focus:border-[#C4907C] focus:ring-4 focus:ring-[#C4907C]/10"
                            autocomplete="off"
                        >
                        <button 
                            type="submit" 
                            class="bg-[#C4907C] hover:bg-[#B07D6A] text-white font-bold px-6 py-3 rounded-xl transition-all shadow-lg flex items-center space-x-2"
                        >
                            <span class="hidden sm:inline">Отправить</span>
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
                            </svg>
                        </button>
                    </form>
                </div>
                
            </div>
        </div>
    </section>
 <!-- 1. Модалка "Оставить заявку" (из шапки) -->
    <div id="leadModal" class="fixed inset-0 z-50 hidden">
        <div class="absolute inset-0 modal-backdrop" onclick="closeLeadModal()"></div>
        <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 bg-white rounded-3xl shadow-2xl p-8 w-full max-w-lg border border-[#C4907C]/10">
            <button onclick="closeLeadModal()" class="absolute top-4 right-4 text-[#7A7D82] hover:text-[#3D4047]">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
            </button>
            <h2 class="text-2xl font-extrabold text-[#3D4047] mb-6">Оставить заявку</h2>
            
            <form class="lead-form-ajax space-y-4" data-type="general">
                <?php echo csrf_field(); ?>
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

    <script>
        // Мобильное меню
        document.getElementById('menuBtn').addEventListener('click', function() {
            document.getElementById('mobileMenu').classList.toggle('hidden');
        });
        
        const chatMessages = document.getElementById('chatMessages');
        const chatForm = document.getElementById('chatForm');
        const messageInput = document.getElementById('messageInput');
        
        // Заглушки ответов бота
        const botResponses = {
            'продать': 'Чтобы продать авто, оставьте заявку на главной странице с госномером. Мы оценим его и свяжемся с вами в течение 2 часов! 🚗',
            'trade-in': 'Trade-In — это обмен вашего старого авто на новое с доплатой. Вы получаете выгоду до 15% по сравнению с обычной продажей. Хотите узнать подробнее?',
            'кредит': 'Мы предлагаем кредит от 4.9% годовых на срок до 7 лет. Решение за 15 минут онлайн! Перейдите на страницу Кредит/Trade-In для калькулятора. 💳',
            'контакты': '📞 Телефон: 8-800-123-45-67\n📧 Email: offer@avtoblog.ru\n📍 Адрес: г. Москва, ул. Примерная, 123\n\nРаботаем ежедневно с 9:00 до 21:00',
            'цена': 'Стоимость зависит от марки, года выпуска и состояния авто. Оставьте заявку с госномером — мы оценим бесплатно!',
            'документы': 'Для продажи нужны: паспорт, ПТС, свидетельство о регистрации. Для Trade-In дополнительно — диагностическая карта.',
            'default': 'Спасибо за вопрос! Я передам его менеджеру. А пока вы можете оставить заявку на сайте, и мы свяжемся с вами в ближайшее время! 😊'
        };
        
        function addMessage(text, isUser = false) {
            const messageDiv = document.createElement('div');
            messageDiv.className = 'message flex items-start space-x-3' + (isUser ? ' flex-row-reverse space-x-reverse' : '');
            
            // Новые цвета для аватаров
            const avatar = isUser 
                ? '<div class="w-10 h-10 bg-[#C4907C] rounded-full flex items-center justify-center flex-shrink-0"><span class="text-white font-bold">Я</span></div>'
                : '<div class="w-10 h-10 bg-[#8BA89A] rounded-full flex items-center justify-center flex-shrink-0"><svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg></div>';
            
            // Новые цвета для пузырей сообщений
            const bubbleClass = isUser 
                ? 'bg-[#C4907C] text-white rounded-2xl rounded-tr-none'
                : 'bg-white text-[#3D4047] rounded-2xl rounded-tl-none border border-[#C4907C]/5';
            
            const timeClass = isUser ? 'text-white/60' : 'text-[#7A7D82]';
            
            messageDiv.innerHTML = `
                ${avatar}
                <div class="${bubbleClass} p-4 shadow-sm max-w-md">
                    <p>${text.replace(/\n/g, '<br>')}</p>
                    <p class="text-xs ${timeClass} mt-2">Только что</p>
                </div>
            `;
            
            chatMessages.appendChild(messageDiv);
            chatMessages.scrollTop = chatMessages.scrollHeight;
        }
        
        function addTypingIndicator() {
            const typingDiv = document.createElement('div');
            typingDiv.className = 'message flex items-start space-x-3';
            typingDiv.id = 'typingIndicator';
            typingDiv.innerHTML = `
                <div class="w-10 h-10 bg-[#8BA89A] rounded-full flex items-center justify-center flex-shrink-0">
                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                    </svg>
                </div>
                <div class="bg-white rounded-2xl rounded-tl-none p-4 shadow-sm border border-[#C4907C]/5">
                    <div class="typing-indicator">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </div>
            `;
            chatMessages.appendChild(typingDiv);
            chatMessages.scrollTop = chatMessages.scrollHeight;
        }
        
        function removeTypingIndicator() {
            const indicator = document.getElementById('typingIndicator');
            if (indicator) indicator.remove();
        }
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
                
                fetch('<?php echo e(route("leads.store")); ?>', {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                        'Accept': 'application/json'
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        form.reset(); // Очищаем форму
                        showSuccessModal(); // Показываем красивое окошко
                    }
                })
                .catch(error => {
                    console.error('Ошибка:', error);
                    alert('Произошла ошибка при отправке. Попробуйте позже.');
                })
                .finally(() => {
                    submitBtn.disabled = false;
                    submitBtn.innerHTML = originalBtnText;
                });
            });
        });
        function getBotResponse(userMessage) {
            const lowerMessage = userMessage.toLowerCase();
            
            for (const [key, response] of Object.entries(botResponses)) {
                if (key !== 'default' && lowerMessage.includes(key)) {
                    return response;
                }
            }
            
            return botResponses.default;
        }
        
        function sendQuickMessage(text) {
            messageInput.value = text;
            chatForm.dispatchEvent(new Event('submit'));
        }
        
        chatForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            const message = messageInput.value.trim();
            if (!message) return;
            
            // Добавляем сообщение пользователя
            addMessage(message, true);
            messageInput.value = '';
            
            // Показываем индикатор печати
            addTypingIndicator();
            
            // Имитируем задержку ответа бота
            setTimeout(() => {
                removeTypingIndicator();
                const response = getBotResponse(message);
                addMessage(response, false);
            }, 1000 + Math.random() * 1000);
        });
    </script>
</body>
</html><?php /**PATH D:\laragon\www\avtoblog\resources\views/chatbot.blade.php ENDPATH**/ ?>
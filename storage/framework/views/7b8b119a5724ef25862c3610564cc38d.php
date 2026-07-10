<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AvtoBlog - Продажа авто</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <style>
        * { font-family: 'Manrope', sans-serif; }
        
        .car-animation {
            position: relative;
            width: 100%;
            height: 300px;
            background: linear-gradient(135deg, #EEF1EB 0%, #FAF7F2 100%);
            border-radius: 24px;
            overflow: hidden;
        }
        
        .car-animation::before {
            content: '';
            position: absolute;
            bottom: 50px;
            left: 0;
            width: 100%;
            height: 4px;
            background: repeating-linear-gradient(
                90deg,
                #C4907C 0px,
                #C4907C 20px,
                transparent 20px,
                transparent 40px
            );
            animation: road 1s linear infinite;
        }
        
        @keyframes road {
            0% { transform: translateX(0); }
            100% { transform: translateX(-40px); }
        }
        
        .car {
            position: absolute;
            bottom: 70px;
            left: 50%;
            transform: translateX(-50%);
            animation: bounce 0.5s ease-in-out infinite;
        }
        
        @keyframes bounce {
            0%, 100% { transform: translateX(-50%) translateY(0); }
            50% { transform: translateX(-50%) translateY(-5px); }
        }
        
        .wheel {
            position: absolute;
            bottom: 50px;
            width: 30px;
            height: 30px;
            background: #3D4047;
            border-radius: 50%;
            border: 4px solid #C4907C;
            animation: spin 0.5s linear infinite;
        }
        
        .wheel-left { left: calc(50% - 40px); }
        .wheel-right { left: calc(50% + 10px); }
        
        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
        
        .car-body {
            width: 120px;
            height: 50px;
            background: #8BA89A;
            border-radius: 10px 10px 5px 5px;
            position: relative;
        }
        
        .car-body::before {
            content: '';
            position: absolute;
            top: -20px;
            left: 20px;
            width: 80px;
            height: 25px;
            background: #8BA89A;
            border-radius: 10px 10px 0 0;
        }
        
        .car-body::after {
            content: '';
            position: absolute;
            top: -15px;
            left: 30px;
            width: 60px;
            height: 20px;
            background: rgba(255, 255, 255, 0.3);
            border-radius: 5px;
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
                <a href="/" class="text-white/70 hover:text-[#C4907C] transition-colors font-medium">Главная</a>
                <a href="/credit-trade-in" class="text-white/70 hover:text-[#C4907C] transition-colors font-medium">Кредит / Trade-In</a>
                <a href="/chatbot" class="text-white/70 hover:text-[#C4907C] transition-colors font-medium">Чат-бот</a>
                <a href="/reviews" class="text-white/70 hover:text-[#C4907C] transition-colors font-medium">Отзывы</a>
            </nav>
            
            <div class="flex items-center space-x-4">
                <a href="tel:88001234567" class="hidden md:block text-white font-bold text-lg">
                    8-800-123-45-67
                </a>    
                <a href="#lead-form" class="hidden lg:inline-flex bg-[#C4907C] hover:bg-[#B07D6A] text-white font-bold px-6 py-2.5 rounded-xl transition-all">
                    Оставить заявку
                </a>
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
            <a href="/chatbot" class="block text-white/70 hover:text-[#C4907C] font-medium">Чат-бот</a>
            <a href="/reviews" class="block text-white/70 hover:text-[#C4907C] font-medium">Отзывы</a>
            <a href="#lead-form" class="block bg-[#C4907C] text-white text-center py-3 rounded-xl font-bold">Оставить заявку</a>
        </div>
    </div>
</header>

    <!-- Hero Section -->
    <section class="py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-center">
                
                <div class="car-animation">
                    <div class="car">
                        <div class="car-body"></div>
                    </div>
                    <div class="wheel wheel-left"></div>
                    <div class="wheel wheel-right"></div>
                </div>
                
                <div id="lead-form" class="bg-white rounded-3xl shadow-xl p-8 border border-[#C4907C]/10">
                    <h2 class="text-3xl font-extrabold text-[#3D4047] mb-6">Оцените ваше авто</h2>
                    
                    <form action="<?php echo e(route('leads.store')); ?>" method="POST" class="space-y-4">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="service_type" value="general">
                        
                        <div>
                            <label class="block text-sm font-medium text-[#7A7D82] mb-2">Госномер</label>
                            <input type="text" name="car_number" placeholder="А123БВ177" 
                                class="w-full bg-[#FAF7F2] border border-[#C4907C]/20 rounded-xl px-5 py-4 text-[#3D4047] placeholder-[#7A7D82] focus:outline-none focus:border-[#C4907C] focus:ring-4 focus:ring-[#C4907C]/10">
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-[#7A7D82] mb-2">Имя</label>
                            <input type="text" name="name" placeholder="Ваше имя" 
                                class="w-full bg-[#FAF7F2] border border-[#C4907C]/20 rounded-xl px-5 py-4 text-[#3D4047] placeholder-[#7A7D82] focus:outline-none focus:border-[#C4907C] focus:ring-4 focus:ring-[#C4907C]/10">
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-[#7A7D82] mb-2">Телефон</label>
                            <input type="tel" name="phone" placeholder="+7 (___) ___-__-__" required
                                class="w-full bg-[#FAF7F2] border border-[#C4907C]/20 rounded-xl px-5 py-4 text-[#3D4047] placeholder-[#7A7D82] focus:outline-none focus:border-[#C4907C] focus:ring-4 focus:ring-[#C4907C]/10">
                        </div>
                        
                        <button type="submit" class="w-full bg-[#C4907C] hover:bg-[#B07D6A] text-white font-bold py-4 rounded-xl transition-all shadow-lg">
                            Узнать стоимость
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Шаги -->
    <section class="py-16 px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto">
            <h2 class="text-4xl font-extrabold text-[#3D4047] mb-12 text-center">Как это работает</h2>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $steps; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $step): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                <div class="bg-white rounded-2xl p-8 shadow-lg border border-[#C4907C]/10 text-center">
                    <div class="w-16 h-16 bg-[#8BA89A] rounded-full flex items-center justify-center mx-auto mb-6">
                        <span class="text-white text-2xl font-bold"><?php echo e($step->order); ?></span>
                    </div>
                    <h3 class="text-xl font-bold text-[#3D4047] mb-3"><?php echo e($step->title); ?></h3>
                    <p class="text-[#7A7D82]"><?php echo e($step->description); ?></p>
                </div>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
            </div>
        </div>
    </section>

    <!-- Отзывы (карусель) -->
    <section class="py-16 px-4 sm:px-6 lg:px-8 bg-[#EEF1EB]">
        <div class="max-w-7xl mx-auto">
            <h2 class="text-4xl font-extrabold text-[#3D4047] mb-12 text-center">Отзывы клиентов</h2>
            
            <div class="relative">
                <div class="swiper reviewsSwiper">
                    <div class="swiper-wrapper">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $reviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $review): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                        <div class="swiper-slide">
                            <div class="bg-white rounded-2xl p-8 shadow-lg border border-[#C4907C]/10">
                                <div class="flex items-center mb-4">
                                    <div class="w-12 h-12 bg-[#C4907C]/20 rounded-full flex items-center justify-center mr-4">
                                        <span class="text-[#C4907C] font-bold"><?php echo e(substr($review->client_name, 0, 1)); ?></span>
                                    </div>
                                    <div>
                                        <div class="font-bold text-[#3D4047]"><?php echo e($review->client_name); ?></div>
                                        <div class="text-sm text-[#7A7D82]"><?php echo e($review->car_model); ?></div>
                                    </div>
                                </div>
                                <p class="text-[#3D4047]/70 italic">"<?php echo e($review->text); ?>"</p>
                            </div>
                        </div>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                    </div>
                </div>
                
                <div class="swiper-button-prev hidden md:flex !text-[#C4907C]"></div>
                <div class="swiper-button-next hidden md:flex !text-[#C4907C]"></div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-[#4A5D6B] py-12 px-4 sm:px-6 lg:px-8">
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

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script>
        document.getElementById('menuBtn').addEventListener('click', function() {
            document.getElementById('mobileMenu').classList.toggle('hidden');
        });
        
        new Swiper('.reviewsSwiper', {
            slidesPerView: 1,
            spaceBetween: 30,
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            breakpoints: {
                768: { slidesPerView: 2 },
                1024: { slidesPerView: 3 }
            }
        });
    </script>
</body>
</html><?php /**PATH D:\laragon\www\avtoblog\resources\views/home.blade.php ENDPATH**/ ?>
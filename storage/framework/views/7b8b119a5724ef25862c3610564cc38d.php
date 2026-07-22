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
                     <form class="lead-form-ajax space-y-4" data-type="general">
    <?php echo csrf_field(); ?>
    <input type="hidden" name="service_type" value="general">
             <!-- Тип лица -->
 <div>
                    <label class="block text-sm font-medium text-[#7A7D82] mb-2">Тип лица</label>
                    <select name="entity_type" class="w-full bg-[#FAF7F2] border border-[#C4907C]/20 rounded-xl px-5 py-4 text-[#3D4047] focus:outline-none focus:border-[#C4907C] focus:ring-4 focus:ring-[#C4907C]/10">
                        <option value="physical">Физическое лицо</option>
                        <option value="legal">Юридическое лицо</option>
                    </select>
                </div>
    
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
        
        <div class="relative px-8 md:px-12">
            <!-- Swiper -->
            <div class="swiper reviewsSwiper">
                <div class="swiper-wrapper">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $reviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $review): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                    <div class="swiper-slide">
                        <div class="bg-white rounded-2xl p-8 shadow-lg border border-[#C4907C]/10 h-full flex flex-col">
                            <!-- Звёзды рейтинга -->
                            <div class="flex items-center mb-4">
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php for($i = 1; $i <= 5; $i++): ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                                    <svg class="w-5 h-5 <?php echo e($i <= $review->rating ? 'text-[#C4907C]' : 'text-gray-300'); ?>" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                    </svg>
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endfor; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                            </div>

                            <!-- Текст отзыва -->
                            <p class="text-[#3D4047]/80 text-sm leading-relaxed mb-6 flex-grow">
                                "<?php echo e($review->text); ?>"
                            </p>

                            <!-- Разделитель -->
                            <div class="border-t border-[#C4907C]/10 pt-4 mt-auto">
                                <div class="flex items-center">
                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($review->client_photo): ?>
                                        <img src="<?php echo e(Storage::url($review->client_photo)); ?>" 
                                             class="w-12 h-12 rounded-full object-cover mr-4 border-2 border-[#C4907C]/20" 
                                             alt="<?php echo e($review->client_name); ?>">
                                    <?php else: ?>
                                        <div class="w-12 h-12 bg-[#C4907C]/20 rounded-full flex items-center justify-center mr-4">
                                            <span class="text-[#C4907C] font-bold text-lg"><?php echo e(substr($review->client_name, 0, 1)); ?></span>
                                        </div>
                                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                                    <div>
                                        <div class="font-bold text-[#3D4047] text-sm"><?php echo e($review->client_name); ?></div>
                                        <div class="text-xs text-[#7A7D82]"><?php echo e($review->car_model); ?></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                </div>
            </div>
            
            <!-- Кнопки навигации (стрелки) -->
            <button class="swiper-button-prev !w-12 !h-12 !bg-white !rounded-full !shadow-lg !border !border-[#C4907C]/20 hover:!bg-[#C4907C] hover:!border-[#C4907C] transition-all"></button>
            <button class="swiper-button-next !w-12 !h-12 !bg-white !rounded-full !shadow-lg !border !border-[#C4907C]/20 hover:!bg-[#C4907C] hover:!border-[#C4907C] transition-all"></button>
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
    <!-- ================= МОДАЛЬНЫЕ ОКНА ================= -->

    <!-- 1. Модалка "Успешная отправка" -->
    <div id="successModal" class="fixed inset-0 z-50 hidden">
        <div class="absolute inset-0 bg-[#3D4047]/70 backdrop-filter backdrop-blur-sm"></div>
        <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 bg-white rounded-3xl shadow-2xl p-8 w-full max-w-md border border-[#8BA89A]/30 text-center">
            <div class="w-16 h-16 bg-[#8BA89A] rounded-full flex items-center justify-center mx-auto mb-4">
                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path></svg>
            </div>
            <h2 class="text-2xl font-extrabold text-[#3D4047] mb-2">Заявка отправлена!</h2>
            <p class="text-[#7A7D82] mb-6">Наш менеджер свяжется с вами в ближайшее время.</p>
            <button onclick="closeSuccessModal()" class="w-full bg-[#4A5D6B] hover:bg-[#3D4F5C] text-white font-bold py-3 rounded-xl transition-all">
                Отлично, спасибо!
            </button>
        </div>
    </div>
   <!-- Подключаем Swiper (если ещё не подключён) -->

<!-- Swiper CSS и JS -->

<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<style>
    /* Кастомные стили для стрелок Swiper */
    .swiper-button-prev::after,
    .swiper-button-next::after {
        font-size: 20px !important;
        font-weight: bold !important;
        color: #C4907C !important;
    }
    
    .swiper-button-prev:hover::after,
    .swiper-button-next:hover::after {
        color: white !important;
    }
    
    /* Отступы для стрелок на мобильных */
    @media (max-width: 768px) {
        .swiper-button-prev,
        .swiper-button-next {
            width: 36px !important;
            height: 36px !important;
        }
        .swiper-button-prev::after,
        .swiper-button-next::after {
            font-size: 16px !important;
        }
    }
</style>

<script>
    // Инициализация карусели отзывов
    new Swiper('.reviewsSwiper', {
        slidesPerView: 1,
        spaceBetween: 20,
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        breakpoints: {
            640: {
                slidesPerView: 2,
                spaceBetween: 24,
            },
            1024: {
                slidesPerView: 3,
                spaceBetween: 30,
            },
        },
    });
</script>
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
         function showSuccessModal() {
        document.getElementById('successModal').classList.remove('hidden');
        document.body.style.overflow = 'hidden';
    }

    function closeSuccessModal() {
        document.getElementById('successModal').classList.add('hidden');
        document.body.style.overflow = '';
    }

    document.querySelectorAll('.lead-form-ajax').forEach(form => {
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            
            const formData = new FormData(this);
            const submitBtn = this.querySelector('button[type="submit"]');
            const originalBtnText = submitBtn.innerHTML;
            
            submitBtn.disabled = true;
            submitBtn.innerHTML = '<svg class="animate-spin h-5 w-5 text-white mx-auto" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg>';
            
            fetch('<?php echo e(route("leads.store")); ?>', {
                method: 'POST',
                body: formData,
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'Accept': 'application/json'
                }
            })
            .then(async response => {
                const contentType = response.headers.get("content-type");
                if (contentType && contentType.indexOf("application/json") !== -1) {
                    return response.json();
                } else {
                    const errorText = await response.text();
                    console.error("Сервер вернул HTML:", errorText);
                    throw new Error("Ошибка сервера");
                }
            })
            .then(data => {
                if (data.success) {
                    form.reset();
                    showSuccessModal();
                } else {
                    alert(data.message || "Проверьте правильность заполнения полей.");
                }
            })
            .catch(error => {
                console.error('Ошибка:', error);
                alert("Произошла ошибка. Попробуйте позже.");
            })
            .finally(() => {
                submitBtn.disabled = false;
                submitBtn.innerHTML = originalBtnText;
            });
        });
    });
    </script>
    <?php if (isset($component)) { $__componentOriginal5e76654ad61b72e653a8a6783d7e13d4 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5e76654ad61b72e653a8a6783d7e13d4 = $attributes; } ?>
<?php $component = App\View\Components\ChatbotWidget::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('chatbot-widget'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\ChatbotWidget::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal5e76654ad61b72e653a8a6783d7e13d4)): ?>
<?php $attributes = $__attributesOriginal5e76654ad61b72e653a8a6783d7e13d4; ?>
<?php unset($__attributesOriginal5e76654ad61b72e653a8a6783d7e13d4); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal5e76654ad61b72e653a8a6783d7e13d4)): ?>
<?php $component = $__componentOriginal5e76654ad61b72e653a8a6783d7e13d4; ?>
<?php unset($__componentOriginal5e76654ad61b72e653a8a6783d7e13d4); ?>
<?php endif; ?>
</body>
</html><?php /**PATH D:\laragon\www\avtoblog\resources\views/home.blade.php ENDPATH**/ ?>
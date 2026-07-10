<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Отзывы - AvtoBlog</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <style>
        * { font-family: 'Manrope', sans-serif; }
    </style>
</head>
<body class="bg-[#FBF7F0]">

    <!-- Header -->
    <header class="bg-white shadow-sm sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <a href="/" class="text-2xl font-extrabold text-[#2C1810]">
                    <span class="text-[#C8963E]">LOGO</span>
                </a>
                
                <nav class="hidden lg:flex items-center space-x-8">
                    <a href="/" class="text-[#2C1810] hover:text-[#C8963E] transition-colors text-sm font-medium">Главная</a>
                    <a href="/credit-trade-in" class="text-[#2C1810] hover:text-[#C8963E] transition-colors text-sm font-medium">Кредит / Trade-In</a>
                    <a href="/chatbot" class="text-[#2C1810] hover:text-[#C8963E] transition-colors text-sm font-medium">Чат-бот</a>
                    <a href="/reviews" class="text-[#C8963E] font-bold text-sm">Отзывы</a>
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
                <a href="/credit-trade-in" class="block text-[#2C1810] hover:text-[#C8963E] font-medium">Кредит / Trade-In</a>
                <a href="/chatbot" class="block text-[#2C1810] hover:text-[#C8963E] font-medium">Чат-бот</a>
                <a href="/reviews" class="block text-[#C8963E] font-bold">Отзывы</a>
                <a href="#lead-form" class="block bg-[#C8963E] text-white text-center py-3 rounded-xl font-bold">Оставить заявку</a>
            </div>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="py-16 px-4 sm:px-6 lg:px-8 bg-gradient-to-br from-[#FBF7F0] to-[#F5EDE3]">
        <div class="max-w-4xl mx-auto text-center">
            <h1 class="text-5xl md:text-6xl font-extrabold text-[#2C1810] mb-6">
                Что говорят наши <span class="text-[#C8963E]">клиенты</span>
            </h1>
            <p class="text-lg text-[#2C1810]/60 max-w-2xl mx-auto">
                Реальные истории людей, которые продали или обменяли свои авто через наш сервис
            </p>
        </div>
    </section>

    <!-- Карусель отзывов -->
    <section class="py-16 px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto">
            <div class="relative">
                <div class="swiper reviewsSwiper">
                    <div class="swiper-wrapper">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $reviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $review): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                        <div class="swiper-slide">
                            <div class="bg-white rounded-3xl p-8 shadow-lg border border-[#C8963E]/10 h-full flex flex-col">
                                <!-- Рейтинг -->
                                <div class="flex items-center mb-4">
                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php for($i = 1; $i <= 5; $i++): ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                                        <svg class="w-5 h-5 <?php echo e($i <= $review->rating ? 'text-[#C8963E]' : 'text-gray-300'); ?>" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                        </svg>
                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endfor; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                                </div>
                                
                                <!-- Текст отзыва -->
                                <p class="text-[#2C1810]/70 italic leading-relaxed mb-6 flex-grow">
                                    "<?php echo e($review->text); ?>"
                                </p>
                                
                                <!-- Автор -->
                                <div class="border-t border-[#C8963E]/10 pt-4">
                                    <div class="flex items-center">
                                        <div class="w-12 h-12 bg-[#C8963E]/20 rounded-full flex items-center justify-center mr-4">
                                            <span class="text-[#C8963E] font-bold text-lg"><?php echo e(substr($review->client_name, 0, 1)); ?></span>
                                        </div>
                                        <div>
                                            <div class="font-bold text-[#2C1810]"><?php echo e($review->client_name); ?></div>
                                            <div class="text-sm text-[#2C1810]/50"><?php echo e($review->car_model); ?></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                    </div>
                </div>
                
                <!-- Кнопки навигации -->
                <div class="swiper-button-prev !text-[#C8963E] !w-12 !h-12 after:!text-xl"></div>
                <div class="swiper-button-next !text-[#C8963E] !w-12 !h-12 after:!text-xl"></div>
            </div>
        </div>
    </section>

    <!-- Все отзывы сеткой -->
    <section class="py-16 px-4 sm:px-6 lg:px-8 bg-[#F5EDE3]">
        <div class="max-w-7xl mx-auto">
            <h2 class="text-4xl font-extrabold text-[#2C1810] mb-12 text-center">Все отзывы</h2>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $reviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $review): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                <div class="bg-white rounded-2xl p-6 shadow-lg border border-[#C8963E]/10">
                    <div class="flex items-center mb-3">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php for($i = 1; $i <= 5; $i++): ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                            <svg class="w-4 h-4 <?php echo e($i <= $review->rating ? 'text-[#C8963E]' : 'text-gray-300'); ?>" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                            </svg>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endfor; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                    </div>
                    <p class="text-[#2C1810]/70 text-sm mb-4">"<?php echo e($review->text); ?>"</p>
                    <div class="border-t border-[#C8963E]/10 pt-3">
                        <div class="font-bold text-[#2C1810] text-sm"><?php echo e($review->client_name); ?></div>
                        <div class="text-xs text-[#2C1810]/50"><?php echo e($review->car_model); ?></div>
                    </div>
                </div>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
            </div>
            
            <!-- Пагинация -->
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($reviews->hasPages()): ?>
            <div class="mt-12">
                <?php echo e($reviews->links()); ?>

            </div>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>
    </section>

    <!-- Форма отзыва 
    <section class="py-16 px-4 sm:px-6 lg:px-8">
        <div class="max-w-2xl mx-auto">
            <div class="bg-white rounded-3xl shadow-xl p-8 border border-[#C8963E]/10">
                <h2 class="text-3xl font-extrabold text-[#2C1810] mb-6 text-center">Оставьте свой отзыв</h2>
                
             <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(session('success')): ?>
    <div class="bg-[#0D7377]/10 border border-[#0D7377] text-[#0D7377] px-4 py-3 rounded-xl mb-6">
        <?php echo e(session('success')); ?>

    </div>
<?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

<?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($errors->any()): ?>
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-xl mb-6">
        <ul>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                <li><?php echo e($error); ?></li>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
        </ul>
    </div>
<?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

<form action="<?php echo e(route('reviews.store')); ?>" method="POST" class="space-y-4">
    <?php echo csrf_field(); ?>
                    
                    <div>
                        <label class="block text-sm font-medium text-[#2C1810]/70 mb-2">Ваше имя</label>
                        <input type="text" name="client_name" required
                            class="w-full bg-[#FBF7F0] border border-[#C8963E]/20 rounded-xl px-5 py-4 text-[#2C1810] placeholder-[#2C1810]/40 focus:outline-none focus:border-[#C8963E] focus:ring-4 focus:ring-[#C8963E]/10">
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-[#2C1810]/70 mb-2">Модель авто</label>
                        <input type="text" name="car_model" placeholder="Например: Toyota Camry 2020"
                            class="w-full bg-[#FBF7F0] border border-[#C8963E]/20 rounded-xl px-5 py-4 text-[#2C1810] placeholder-[#2C1810]/40 focus:outline-none focus:border-[#C8963E] focus:ring-4 focus:ring-[#C8963E]/10">
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-[#2C1810]/70 mb-2">Оценка</label>
                        <div class="flex space-x-2" id="ratingStars">
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php for($i = 1; $i <= 5; $i++): ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                                <button type="button" data-rating="<?php echo e($i); ?>" class="rating-star text-3xl text-gray-300 hover:text-[#C8963E] transition-colors">★</button>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endfor; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                            <input type="hidden" name="rating" id="ratingInput" value="5" required>
                        </div>
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-[#2C1810]/70 mb-2">Ваш отзыв</label>
                        <textarea name="text" rows="5" required
                            class="w-full bg-[#FBF7F0] border border-[#C8963E]/20 rounded-xl px-5 py-4 text-[#2C1810] placeholder-[#2C1810]/40 focus:outline-none focus:border-[#C8963E] focus:ring-4 focus:ring-[#C8963E]/10 resize-none"></textarea>
                    </div>
                    
                    <button type="submit" class="w-full bg-[#C8963E] hover:bg-[#B8860B] text-white font-bold py-4 rounded-xl transition-all shadow-lg">
                        Отправить отзыв
                    </button>
                </form>
            </div>
        </div>
    </section> -->

    <!-- Footer -->
    <footer class="bg-[#2C1810] py-12 px-4 sm:px-6 lg:px-8">
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

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script>
        // Мобильное меню
        document.getElementById('menuBtn').addEventListener('click', function() {
            document.getElementById('mobileMenu').classList.toggle('hidden');
        });
        
        // Swiper для карусели
        new Swiper('.reviewsSwiper', {
            slidesPerView: 1,
            spaceBetween: 30,
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            breakpoints: {
                768: {
                    slidesPerView: 2,
                },
                1024: {
                    slidesPerView: 3,
                }
            }
        });
        
        // Рейтинг звездами
        const ratingStars = document.querySelectorAll('.rating-star');
        const ratingInput = document.getElementById('ratingInput');
        
        ratingStars.forEach(star => {
            star.addEventListener('click', function() {
                const rating = parseInt(this.dataset.rating);
                ratingInput.value = rating;
                
                ratingStars.forEach((s, index) => {
                    if (index < rating) {
                        s.classList.remove('text-gray-300');
                        s.classList.add('text-[#C8963E]');
                    } else {
                        s.classList.remove('text-[#C8963E]');
                        s.classList.add('text-gray-300');
                    }
                });
            });
        });
        
        // Установить начальный рейтинг
        ratingStars.forEach((s, index) => {
            if (index < 5) {
                s.classList.remove('text-gray-300');
                s.classList.add('text-[#C8963E]');
            }
        });
    </script>
</body>
</html><?php /**PATH D:\laragon\www\avtoblog\resources\views/reviews.blade.php ENDPATH**/ ?>
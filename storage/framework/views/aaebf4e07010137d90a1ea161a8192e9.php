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
        .modal-backdrop {
            background-color: rgba(61, 64, 71, 0.7); /* Полупрозрачный темный цвет из новой темы */
            backdrop-filter: blur(4px);
            -webkit-backdrop-filter: blur(4px); /* Для поддержки Safari */
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
                    <a href="/chatbot" class="text-white/70 hover:text-[#C4907C] transition-colors text-sm font-medium">Чат-бот</a>
                    <a href="/reviews" class="text-[#C4907C] font-bold text-sm">Отзывы</a>
                </nav>
                
                <div class="flex items-center space-x-4">
                    <a href="tel:88001234567" class="hidden md:block text-white font-bold text-lg">8-800-123-45-67</a>
<button onclick="openLeadModal()" class="hidden lg:inline-flex bg-[#C4907C] hover:bg-[#B07D6A] text-white font-bold px-5 py-2 rounded-lg text-sm transition-all">                        Оставить заявку
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
                <a href="/credit-trade-in" class="block text-white/70 hover:text-[#C4907C] font-medium">Кредит / Trade-In</a>
                <a href="/chatbot" class="block text-white/70 hover:text-[#C4907C] font-medium">Чат-бот</a>
                <a href="/reviews" class="block text-[#C4907C] font-bold">Отзывы</a>
                <button onclick="openLeadModal()" class="w-full bg-[#C4907C] text-white text-center py-3 rounded-xl font-bold">Оставить заявку</button>
            </div>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="py-16 px-4 sm:px-6 lg:px-8 bg-gradient-to-br from-[#FAF7F2] to-[#EEF1EB]">
        <div class="max-w-4xl mx-auto text-center">
            <h1 class="text-5xl md:text-6xl font-extrabold text-[#3D4047] mb-6">
                Что говорят наши <span class="text-[#C4907C]">клиенты</span>
            </h1>
            <p class="text-lg text-[#7A7D82] max-w-2xl mx-auto">
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
                            <div class="bg-white rounded-3xl p-8 shadow-lg border border-[#C4907C]/10 h-full flex flex-col">
                                <!-- Рейтинг -->
                                <div class="flex items-center mb-4">
                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php for($i = 1; $i <= 5; $i++): ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                                        <svg class="w-5 h-5 <?php echo e($i <= $review->rating ? 'text-[#C4907C]' : 'text-gray-300'); ?>" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                        </svg>
                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endfor; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                                </div>
                                
                                <!-- Текст отзыва -->
                                <p class="text-[#3D4047]/80 italic leading-relaxed mb-6 flex-grow">
                                    "<?php echo e($review->text); ?>"
                                </p>
                                
                                <!-- Автор -->
                                <div class="border-t border-[#C4907C]/10 pt-4">
                                    <div class="flex items-center">
                                        <div class="w-12 h-12 bg-[#C4907C]/20 rounded-full flex items-center justify-center mr-4">
                                            <span class="text-[#C4907C] font-bold text-lg"><?php echo e(substr($review->client_name, 0, 1)); ?></span>
                                        </div>
                                        <div>
                                            <div class="font-bold text-[#3D4047]"><?php echo e($review->client_name); ?></div>
                                            <div class="text-sm text-[#7A7D82]"><?php echo e($review->car_model); ?></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                    </div>
                </div>
                
                <!-- Кнопки навигации -->
                <div class="swiper-button-prev !text-[#C4907C] !w-12 !h-12 after:!text-xl"></div>
                <div class="swiper-button-next !text-[#C4907C] !w-12 !h-12 after:!text-xl"></div>
            </div>
        </div>
    </section>

    <!-- Все отзывы сеткой -->
    <section class="py-16 px-4 sm:px-6 lg:px-8 bg-[#EEF1EB]">
        <div class="max-w-7xl mx-auto">
            <h2 class="text-4xl font-extrabold text-[#3D4047] mb-12 text-center">Все отзывы</h2>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $reviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $review): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                <div class="bg-white rounded-2xl p-6 shadow-lg border border-[#C4907C]/10">
                    <div class="flex items-center mb-3">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php for($i = 1; $i <= 5; $i++): ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                            <svg class="w-4 h-4 <?php echo e($i <= $review->rating ? 'text-[#C4907C]' : 'text-gray-300'); ?>" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                            </svg>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endfor; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                    </div>
                    <p class="text-[#3D4047]/80 text-sm mb-4">"<?php echo e($review->text); ?>"</p>
                    <div class="border-t border-[#C4907C]/10 pt-3">
                        <div class="font-bold text-[#3D4047] text-sm"><?php echo e($review->client_name); ?></div>
                        <div class="text-xs text-[#7A7D82]"><?php echo e($review->car_model); ?></div>
                    </div>
                </div>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
            </div>
            
            <!-- Пагинация -->
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($reviews->hasPages()): ?>
            <div class="mt-12 flex justify-center">
                <?php echo e($reviews->links()); ?>

            </div>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>
    </section>

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
                        s.classList.add('text-[#C4907C]');
                    } else {
                        s.classList.remove('text-[#C4907C]');
                        s.classList.add('text-gray-300');
                    }
                });
            });
        });
        
        // Установить начальный рейтинг (5 звезд)
        ratingStars.forEach((s, index) => {
            if (index < 5) {
                s.classList.remove('text-gray-300');
                s.classList.add('text-[#C4907C]');
            }
        });
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
            closeLeadModal();
            document.getElementById('successModal').classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }

        function closeSuccessModal() {
            document.getElementById('successModal').classList.add('hidden');
            document.body.style.overflow = '';
        }

        // AJAX отправка форм (такая же надежная, как на странице кредита)
        document.querySelectorAll('.lead-form-ajax').forEach(form => {
            form.addEventListener('submit', function(e) {
                e.preventDefault();
                
                const formData = new FormData(this);
                const submitBtn = this.querySelector('button[type="submit"]');
                const originalBtnText = submitBtn.innerHTML;
                
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
                .then(async response => {
                    const contentType = response.headers.get("content-type");
                    if (contentType && contentType.indexOf("application/json") !== -1) {
                        return response.json();
                    } else {
                        const errorText = await response.text();
                        console.error("Сервер вернул HTML вместо JSON:", errorText);
                        throw new Error("Ошибка сервера");
                    }
                })
                .then(data => {
                    if (data.success) {
                        form.reset();
                        showSuccessModal();
                    } else {
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
</body>
</html><?php /**PATH D:\laragon\www\avtoblog\resources\views/reviews.blade.php ENDPATH**/ ?>
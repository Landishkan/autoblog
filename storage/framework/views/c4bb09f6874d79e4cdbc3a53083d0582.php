<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AvtoBlog — выкуп автомобилей</title>

    <link rel="icon" href="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 32 32'%3E%3Crect width='32' height='32' fill='%233D4047'/%3E%3Cpath d='M7 19.5h18M9.5 19.5l1.8-4.6a2.5 2.5 0 0 1 2.3-1.6h5.2a2.5 2.5 0 0 1 2 1l3.2 4.2' stroke='%23C4907C' stroke-width='1.4' fill='none' stroke-linecap='round'/%3E%3Ccircle cx='11.5' cy='21' r='1.6' fill='none' stroke='%23FAF7F2' stroke-width='1.4'/%3E%3Ccircle cx='21' cy='21' r='1.6' fill='none' stroke='%23FAF7F2' stroke-width='1.4'/%3E%3C/svg%3E">

    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Manrope', 'system-ui', 'sans-serif'],
                        display: ['Unbounded', 'system-ui', 'sans-serif'],
                    },
                    colors: {
                        sand: '#FAF7F2',
                        mist: '#EEF1EB',
                        clay: '#C4907C',
                        'clay-dark': '#B07D6A',
                        steel: '#4A5D6B',
                        ink: '#3D4047',
                        sage: '#8BA89A',
                        muted: '#7A7D82',
                    },
                    letterSpacing: { label: '.18em', eyebrow: '.3em' },
                },
            },
        }
    </script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700&family=Unbounded:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <style>
        :root{
            --sand:#FAF7F2; --mist:#EEF1EB; --clay:#C4907C; --clay-dark:#B07D6A;
            --steel:#4A5D6B; --ink:#3D4047; --sage:#8BA89A; --muted:#7A7D82;
            --ease:cubic-bezier(.16,1,.3,1);
        }
        html{ scroll-behavior:smooth; }
        body{
            font-family:'Manrope', system-ui, sans-serif; overflow-x:hidden;
            background:var(--ink); color:var(--sand);
        }
        ::selection{ background:var(--clay); color:var(--ink); }

        /* ---------- появление ---------- */
        .rise{
            opacity:0; transform:translateY(20px);
            transition:opacity .9s var(--ease), transform .9s var(--ease);
            transition-delay:var(--d,0ms);
        }
        .rise.in{ opacity:1; transform:none; }
        .rule{
            height:1px; background:var(--clay); opacity:.5;
            transform:scaleX(0); transform-origin:left;
            transition:transform 1.1s var(--ease); transition-delay:var(--d,0ms);
        }
        .rule.in{ transform:scaleX(1); }

        /* ---------- логотип: минимальный монограммный знак «A» ---------- */
        .mark{ width:30px; height:30px; display:block; overflow:visible; }
        .mark .bar{ transition:transform .6s var(--ease), opacity .5s ease; transform-box:fill-box; transform-origin:center; }
        .logo:hover .mark .bar-l{ transform:translateX(-1.5px); }
        .logo:hover .mark .bar-r{ transform:translateX(1.5px); }
        .logo:hover .mark .bar-x{ transform:scaleX(1.15); }

        /* ---------- хедер ---------- */
        .site-header{ transition:background .5s var(--ease), border-color .5s var(--ease); border-bottom:1px solid transparent; }
        .site-header.solid{
            background:rgba(61,64,71,.9); backdrop-filter:blur(18px) saturate(150%);
            border-bottom-color:rgba(250,247,242,.09);
        }
        .nav-link{ position:relative; }
        .nav-link::after{
            content:''; position:absolute; left:0; right:0; bottom:-6px; height:1px; background:var(--clay);
            transform:scaleX(0); transform-origin:left; transition:transform .5s var(--ease);
        }
        .nav-link:hover::after{ transform:scaleX(1); }

        #mobileMenu{ max-height:0; overflow:hidden; transition:max-height .6s var(--ease); }
        #mobileMenu.open{ max-height:360px; }
        .burger span{ display:block; width:22px; height:1px; background:currentColor; transition:transform .5s var(--ease), opacity .3s ease; }
        .burger.active span:nth-child(1){ transform:translateY(6px) rotate(45deg); }
        .burger.active span:nth-child(2){ opacity:0; }
        .burger.active span:nth-child(3){ transform:translateY(-6px) rotate(-45deg); }

        /* ---------- hero ---------- */
        .hero{ position:relative; min-height:94vh; overflow:hidden; }
        @media (max-width:1023px){ .hero{ min-height:auto; } }
        .hero video{
            position:absolute; inset:0; width:100%; height:100%; object-fit:cover;
            opacity:0; animation:filmIn 2.2s var(--ease) .15s forwards;
        }
        @keyframes filmIn{ from{ opacity:0; transform:scale(1.07) } to{ opacity:.85; transform:scale(1) } }
        .hero-scrim{
            position:absolute; inset:0; pointer-events:none; z-index:1;
            background:
                linear-gradient(90deg, rgba(61,64,71,.86) 0%, rgba(61,64,71,.66) 42%, rgba(61,64,71,.22) 100%),
                linear-gradient(180deg, rgba(61,64,71,.58) 0%, rgba(61,64,71,0) 32%, rgba(61,64,71,.72) 100%);
        }

        /* ---------- поля формы ---------- */
        .fld{ position:relative; }
        .fld input, .fld select{
            width:100%; background:transparent; border:0; border-bottom:1px solid rgba(61,64,71,.22);
            padding:7px 0; font-size:15px; color:var(--ink); border-radius:0;
            transition:border-color .5s var(--ease);
        }
        .fld input::placeholder{ color:rgba(122,125,130,.7); }
        .fld input:focus, .fld select:focus{ outline:none; border-bottom-color:var(--clay); }
        .fld select{ appearance:none; cursor:pointer; }
        .fld .caret{ position:absolute; right:0; bottom:14px; pointer-events:none; color:var(--muted); }

        /* волосяная сетка на тёмном */
        .hair-grid{ display:grid; gap:1px; background:rgba(196,144,124,.22); }
        .hair-grid > *{ background:var(--ink); }

        .step-icon{ transition:transform .7s var(--ease); }
        .step:hover .step-icon{ transform:translateY(-4px); }

        /* ---------- swiper ---------- */
        .swiper-slide{ height:auto; }
        .swiper-button-prev, .swiper-button-next{
            width:52px !important; height:52px !important; border-radius:50% !important;
            border:1px solid rgba(250,247,242,.25); color:var(--sand) !important;
            transition:background .5s var(--ease), color .5s var(--ease), border-color .5s var(--ease);
            top:auto !important; bottom:0 !important; margin:0 !important;
        }
        .swiper-button-prev{ left:auto !important; right:66px !important; }
        .swiper-button-next{ right:0 !important; }
        .swiper-button-prev:hover, .swiper-button-next:hover{ background:var(--clay); border-color:var(--clay); color:var(--ink) !important; }
        .swiper-button-prev::after, .swiper-button-next::after{ font-size:13px !important; font-weight:600 !important; }
        .swiper-button-disabled{ opacity:.25 !important; }

        /* ---------- кнопки ---------- */
        .btn{ position:relative; overflow:hidden; isolation:isolate; transition:color .5s var(--ease), border-color .5s var(--ease); }
        .btn::before{
            content:''; position:absolute; inset:0; z-index:-1; background:var(--clay);
            transform:translateY(101%); transition:transform .6s var(--ease);
        }
        .btn:hover::before{ transform:translateY(0); }

        /* кнопка-заявка: сразу заполненная, без ожидания hover */
        .btn-solid{
            background:var(--clay); color:var(--ink);
            box-shadow:0 10px 28px -8px rgba(196,144,124,.55);
            transition:background .4s var(--ease), box-shadow .4s var(--ease), transform .3s var(--ease);
        }
        .btn-solid:hover{
            background:var(--clay-dark);
            box-shadow:0 14px 34px -8px rgba(196,144,124,.7);
            transform:translateY(-2px);
        }
        .btn-solid:active{ transform:translateY(0); }

        /* ---------- модалка ---------- */
        #successModal .panel{ opacity:0; transform:translateY(14px); transition:all .6s var(--ease); }
        #successModal.show .panel{ opacity:1; transform:none; }
        #successModal .veil{ opacity:0; transition:opacity .5s ease; }
        #successModal.show .veil{ opacity:1; }
        .draw{ stroke-dasharray:26; stroke-dashoffset:26; animation:draw .8s var(--ease) .25s forwards; }
        @keyframes draw{ to{ stroke-dashoffset:0 } }

        @media (prefers-reduced-motion:reduce){
            *,*::before,*::after{ animation-duration:.01ms !important; transition-duration:.01ms !important; }
            .rise{ opacity:1 !important; transform:none !important; }
            .rule{ transform:scaleX(1) !important; }
            .hero video{ opacity:.85 !important; }
        }
    </style>
</head>
<body class="bg-ink text-sand antialiased">

<!-- ============================== HEADER ============================== -->
<header id="siteHeader" class="site-header fixed top-0 inset-x-0 z-50">
    <div class="max-w-[1400px] mx-auto px-6 lg:px-12">
        <div class="flex items-center justify-between h-20">

            <a href="/" class="logo flex items-center gap-3.5">
                <svg class="mark" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path class="bar bar-l" d="M5 25L14.3 5.6a.8.8 0 0 1 1.4 0L25 25" stroke="#C4907C" stroke-width="2.6" stroke-linecap="round" stroke-linejoin="round"/>
                    <line class="bar bar-x" x1="10" y1="16.4" x2="20" y2="16.4" stroke="#C4907C" stroke-width="2.6" stroke-linecap="round"/>
                </svg>
                <span class="font-display text-[22px] leading-none tracking-tight font-semibold">
                    Avto<span class="text-clay">Blog</span>
                </span>
            </a>

            <nav class="hidden lg:flex items-center gap-10">
                <a href="/" class="nav-link text-[11px] uppercase tracking-label font-semibold text-sand/65 hover:text-sand transition-colors duration-500">Главная</a>
                <a href="/credit-trade-in" class="nav-link text-[11px] uppercase tracking-label font-semibold text-sand/65 hover:text-sand transition-colors duration-500">Кредит / Trade-In</a>
                <a href="/chatbot" class="nav-link text-[11px] uppercase tracking-label font-semibold text-sand/65 hover:text-sand transition-colors duration-500">Чат-бот</a>
                <a href="/reviews" class="nav-link text-[11px] uppercase tracking-label font-semibold text-sand/65 hover:text-sand transition-colors duration-500">Отзывы</a>
            </nav>

            <div class="flex items-center gap-7">
                <a href="tel:88001234567" class="hidden md:block font-display text-[17px] font-semibold hover:text-clay transition-colors duration-500">
                    8-800-123-45-67
                </a>
                <a href="#lead-form" class="btn hidden lg:inline-flex items-center border border-sand/30 text-sand hover:text-ink px-7 py-3 text-[11px] uppercase tracking-label font-semibold">
                    Оставить заявку
                </a>
                <button id="menuBtn" aria-label="Меню" class="burger lg:hidden flex flex-col gap-[5px] text-sand p-2 -mr-2">
                    <span></span><span></span><span></span>
                </button>
            </div>
        </div>
    </div>

    <div id="mobileMenu" class="lg:hidden bg-ink/95 backdrop-blur-md">
        <div class="px-6 py-6 space-y-5 border-t border-sand/10">
            <a href="/" class="block text-[11px] uppercase tracking-label font-semibold text-sand/65">Главная</a>
            <a href="/credit-trade-in" class="block text-[11px] uppercase tracking-label font-semibold text-sand/65">Кредит / Trade-In</a>
            <a href="/chatbot" class="block text-[11px] uppercase tracking-label font-semibold text-sand/65">Чат-бот</a>
            <a href="/reviews" class="block text-[11px] uppercase tracking-label font-semibold text-sand/65">Отзывы</a>
            <a href="#lead-form" class="block text-center border border-clay text-clay py-3.5 text-[11px] uppercase tracking-label font-semibold">Оставить заявку</a>
        </div>
    </div>
</header>

<!-- ============================== HERO ============================== -->
<section class="hero flex items-center">
    <video autoplay muted loop playsinline preload="metadata"
           poster="<?php echo e(asset('img/hero-poster.jpg')); ?>">
        <source src="<?php echo e(asset('video/hero.mp4')); ?>" type="video/mp4">
    </video>
    <div class="hero-scrim"></div>

    <div class="relative z-[3] w-full max-w-[1400px] mx-auto px-6 lg:px-12 pt-32 pb-20 lg:pt-40 lg:pb-28">
        <div class="grid lg:grid-cols-12 gap-14 lg:gap-20 items-center">

            <div class="lg:col-span-7">
                <p class="rise text-[10px] uppercase tracking-eyebrow font-semibold text-clay mb-8">
                    Выкуп автомобилей в Москве
                </p>

                <h1 class="rise font-display font-extrabold leading-[.94] tracking-tight text-[clamp(2.7rem,6.4vw,5.4rem)]" style="--d:120ms">
                    Продайте авто<br>
                    <span class="text-clay">выгодно</span> сегодня
                </h1>

                <div class="rule mt-10 mb-8 max-w-[120px]" style="--d:400ms"></div>

                <p class="rise max-w-md text-sand/60 text-[17px] leading-relaxed" style="--d:280ms">
                    Оценка за две минуты, честная цена без торга у подъезда
                    и деньги в день обращения.
                </p>

                <div class="rise mt-14 grid grid-cols-2 sm:grid-cols-3 gap-x-10 gap-y-8 max-w-xl" style="--d:420ms">
                    <div>
                        <div class="h-px w-8 bg-clay/60 mb-5"></div>
                        <div class="font-display font-bold text-[42px] leading-none">12 000<span class="text-clay">+</span></div>
                        <div class="mt-3 text-[10px] uppercase tracking-label font-semibold text-sand/40">выкупленных авто</div>
                    </div>
                    <div>
                        <div class="h-px w-8 bg-clay/60 mb-5"></div>
                        <div class="font-display font-bold text-[42px] leading-none">2 <span class="text-clay">мин</span></div>
                        <div class="mt-3 text-[10px] uppercase tracking-label font-semibold text-sand/40">на оценку</div>
                    </div>
                    <div>
                        <div class="h-px w-8 bg-clay/60 mb-5"></div>
                        <div class="font-display font-bold text-[42px] leading-none">24<span class="text-clay">/</span>7</div>
                        <div class="mt-3 text-[10px] uppercase tracking-label font-semibold text-sand/40">приём заявок</div>
                    </div>
                </div>
            </div>

            <!-- форма: единственный светлый объект на странице -->
            <div id="lead-form" class="rise max-w-md mx-auto lg:max-w-none lg:mx-0 lg:col-span-5" style="--d:340ms">
                <div class="bg-sand text-ink p-6 lg:p-7">
                    <p class="text-[10px] uppercase tracking-eyebrow font-semibold text-clay">Бесплатная оценка</p>
                    <h2 class="font-display font-bold text-[24px] leading-tight mt-2 mb-5">Оцените ваше авто</h2>

                    <form class="lead-form-ajax space-y-3.5" data-type="general">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="service_type" value="general">

                        <div class="fld">
                            <label class="block text-[10px] uppercase tracking-label font-semibold text-muted mb-1">Тип лица</label>
                            <select name="entity_type">
                                <option value="physical">Физическое лицо</option>
                                <option value="legal">Юридическое лицо</option>
                            </select>
                            <svg class="caret w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 9l6 6 6-6"/>
                            </svg>
                        </div>

                        <div class="fld">
                            <label class="block text-[10px] uppercase tracking-label font-semibold text-muted mb-1">Госномер</label>
                            <input type="text" name="car_number" placeholder="А123БВ177">
                        </div>

                        <div class="fld">
                            <label class="block text-[10px] uppercase tracking-label font-semibold text-muted mb-1">Имя</label>
                            <input type="text" name="name" placeholder="Ваше имя">
                        </div>

                        <div class="fld">
                            <label class="block text-[10px] uppercase tracking-label font-semibold text-muted mb-1">Телефон</label>
                            <input type="tel" name="phone" placeholder="+7 (___) ___-__-__" required>
                        </div>

                        <button type="submit" class="btn-solid w-full py-3 text-[11px] uppercase tracking-label font-semibold mt-1">
                            Узнать стоимость
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ============================== ШАГИ ============================== -->
<section class="relative py-24 lg:py-36 overflow-hidden">
    <div class="relative z-[1] max-w-[1400px] mx-auto px-6 lg:px-12">
        <div class="max-w-2xl mb-16 lg:mb-20">
            <p class="rise text-[10px] uppercase tracking-eyebrow font-semibold text-clay mb-6">Процесс</p>
            <h2 class="rise font-display font-bold text-[clamp(2rem,4vw,3.4rem)] leading-[1.05] tracking-tight" style="--d:100ms">
                Как это работает
            </h2>
            <div class="rule mt-9 max-w-[90px]" style="--d:260ms"></div>
        </div>

        <?php
            $stepIcons = [
                '<path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-4.3-4.3M11 19a8 8 0 100-16 8 8 0 000 16z"/>',
                '<path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h4M8 3h8a2 2 0 012 2v15l-3-2-2 2-2-2-2 2-3-2V5a2 2 0 012-2z"/>',
                '<path stroke-linecap="round" stroke-linejoin="round" d="M12 7v10m3-7.5c0-1.1-1.3-2-3-2s-3 .9-3 2 1.3 2 3 2 3 .9 3 2-1.3 2-3 2-3-.9-3-2M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>',
                '<path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>',
            ];
        ?>

        <div class="hair-grid md:grid-cols-3">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $steps; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $step): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
            <div class="step rise p-9 lg:p-12" style="--d:<?php echo e($loop->index * 140); ?>ms">
                <div class="flex items-start justify-between mb-12">
                    <svg class="step-icon w-7 h-7 text-clay" fill="none" stroke="currentColor" stroke-width="1.25" viewBox="0 0 24 24">
                        <?php echo $stepIcons[$loop->index % count($stepIcons)]; ?>

                    </svg>
                    <span class="font-display font-bold text-[46px] leading-none text-sand/15">
                        <?php echo e(str_pad($step->order, 2, '0', STR_PAD_LEFT)); ?>

                    </span>
                </div>
                <h3 class="font-display font-bold text-[24px] leading-snug mb-4"><?php echo e($step->title); ?></h3>
                <p class="text-sand/50 text-[15px] leading-relaxed"><?php echo e($step->description); ?></p>
            </div>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
        </div>
    </div>
</section>

<!-- ============================== ОТЗЫВЫ ============================== -->
<section class="relative py-24 lg:py-36 overflow-hidden border-t border-sand/8">
    <div class="relative z-[1] max-w-[1400px] mx-auto px-6 lg:px-12">
        <div class="max-w-2xl mb-16 lg:mb-20">
            <p class="rise text-[10px] uppercase tracking-eyebrow font-semibold text-clay mb-6">Отзывы</p>
            <h2 class="rise font-display font-bold text-[clamp(2rem,4vw,3.4rem)] leading-[1.05] tracking-tight" style="--d:100ms">
                Что говорят клиенты
            </h2>
            <div class="rule mt-9 max-w-[90px]" style="--d:260ms"></div>
        </div>

        <div class="rise relative pb-24" style="--d:180ms">
            <div class="swiper reviewsSwiper">
                <div class="swiper-wrapper">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $reviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $review): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                    <div class="swiper-slide">
                        <figure class="h-full flex flex-col border-t border-sand/15 pt-8">
                            <div class="flex gap-1 mb-7">
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php for($i = 1; $i <= 5; $i++): ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                                    <svg class="w-3.5 h-3.5 <?php echo e($i <= $review->rating ? 'text-clay' : 'text-sand/15'); ?>" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M10 1.6l2.35 5.05 5.4.55-4.05 3.7 1.15 5.35L10 13.5l-4.85 2.75 1.15-5.35L2.25 7.2l5.4-.55L10 1.6z"/>
                                    </svg>
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endfor; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                            </div>

                            <blockquote class="font-medium text-[18px] leading-[1.6] text-sand/95 flex-grow">
                                <?php echo e($review->text); ?>

                            </blockquote>

                            <figcaption class="flex items-center gap-4 mt-9 pt-7 border-t border-sand/10">
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($review->client_photo): ?>
                                    <img src="<?php echo e(Storage::url($review->client_photo)); ?>"
                                         class="w-11 h-11 rounded-full object-cover grayscale" alt="<?php echo e($review->client_name); ?>">
                                <?php else: ?>
                                    <span class="w-11 h-11 rounded-full border border-clay/45 flex items-center justify-center font-display font-bold text-[17px] text-clay">
                                        <?php echo e(mb_substr($review->client_name, 0, 1)); ?>

                                    </span>
                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                <span>
                                    <span class="block text-[13px] font-semibold"><?php echo e($review->client_name); ?></span>
                                    <span class="block text-[10px] uppercase tracking-label text-sand/40 mt-1"><?php echo e($review->car_model); ?></span>
                                </span>
                            </figcaption>
                        </figure>
                    </div>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                </div>
            </div>

            <button class="swiper-button-prev" aria-label="Назад"></button>
            <button class="swiper-button-next" aria-label="Вперёд"></button>
        </div>
    </div>
</section>

<!-- ============================== FOOTER ============================== -->
<footer class="border-t border-sand/10 pt-20 lg:pt-28 pb-10">
    <div class="max-w-[1400px] mx-auto px-6 lg:px-12">
        <div class="grid md:grid-cols-3 gap-14 pb-16 lg:pb-20">

            <div>
                <a href="/" class="logo inline-flex items-center gap-3.5 mb-6">
                    <svg class="mark" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path class="bar bar-l" d="M5 25L14.3 5.6a.8.8 0 0 1 1.4 0L25 25" stroke="#C4907C" stroke-width="2.6" stroke-linecap="round" stroke-linejoin="round"/>
                        <line class="bar bar-x" x1="10" y1="16.4" x2="20" y2="16.4" stroke="#C4907C" stroke-width="2.6" stroke-linecap="round"/>
                    </svg>
                    <span class="font-display text-[22px] leading-none tracking-tight font-semibold">
                        Avto<span class="text-clay">Blog</span>
                    </span>
                </a>
                <p class="text-sand/40 text-[15px] leading-relaxed max-w-xs">
                    Сервис продажи и обмена автомобилей.
                </p>
            </div>

            <div>
                <p class="text-[10px] uppercase tracking-eyebrow font-semibold text-sand/35 mb-7">Контакты</p>
                <a href="tel:88001234567" class="font-display font-bold text-[28px] leading-none hover:text-clay transition-colors duration-500">
                    8-800-123-45-67
                </a>
                <p class="text-sand/40 text-[15px] mt-6">offer@avtoblog.ru</p>
                <p class="text-sand/40 text-[15px] mt-1.5">г. Москва, ул. Примерная, 123</p>
            </div>

            <div>
                <p class="text-[10px] uppercase tracking-eyebrow font-semibold text-sand/35 mb-7">Навигация</p>
                <ul class="space-y-4">
                    <li><a href="/" class="text-sand/55 hover:text-clay text-[15px] transition-colors duration-500">Главная</a></li>
                    <li><a href="/credit-trade-in" class="text-sand/55 hover:text-clay text-[15px] transition-colors duration-500">Кредит / Trade-In</a></li>
                    <li><a href="/reviews" class="text-sand/55 hover:text-clay text-[15px] transition-colors duration-500">Отзывы</a></li>
                </ul>
            </div>
        </div>

        <div class="border-t border-sand/10 pt-8">
            <p class="text-[10px] uppercase tracking-label text-sand/25">© <?php echo e(date('Y')); ?> AvtoBlog</p>
        </div>
    </div>
</footer>

<!-- ============================== МОДАЛКА ============================== -->
<div id="successModal" class="fixed inset-0 z-[60] hidden">
    <div class="veil absolute inset-0 bg-ink/85 backdrop-blur-sm" onclick="closeSuccessModal()"></div>
    <div class="panel absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 bg-sand text-ink w-[92%] max-w-md p-10 text-center">
        <svg class="w-10 h-10 mx-auto mb-7 text-sage" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path class="draw" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M5 13l4 4L19 7"/>
        </svg>
        <h2 class="font-display font-bold text-[28px] leading-tight mb-4">Заявка отправлена</h2>
        <p class="text-muted text-[15px] leading-relaxed mb-9">Наш менеджер свяжется с вами в ближайшее время.</p>
        <button onclick="closeSuccessModal()" class="btn w-full border border-ink text-ink hover:text-sand py-3.5 text-[11px] uppercase tracking-label font-semibold">
            Закрыть
        </button>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script>
    new Swiper('.reviewsSwiper', {
        slidesPerView: 1,
        spaceBetween: 48,
        speed: 800,
        navigation: { nextEl: '.swiper-button-next', prevEl: '.swiper-button-prev' },
        breakpoints: {
            768:  { slidesPerView: 2, spaceBetween: 48 },
            1200: { slidesPerView: 3, spaceBetween: 64 }
        }
    });

    const menuBtn = document.getElementById('menuBtn');
    const mobileMenu = document.getElementById('mobileMenu');
    menuBtn.addEventListener('click', () => {
        mobileMenu.classList.toggle('open');
        menuBtn.classList.toggle('active');
    });
    mobileMenu.querySelectorAll('a').forEach(a => a.addEventListener('click', () => {
        mobileMenu.classList.remove('open');
        menuBtn.classList.remove('active');
    }));

    const header = document.getElementById('siteHeader');
    const onScroll = () => header.classList.toggle('solid', window.scrollY > 40);
    window.addEventListener('scroll', onScroll, { passive: true });
    onScroll();

    const io = new IntersectionObserver((entries) => {
        entries.forEach(e => {
            if (e.isIntersecting) { e.target.classList.add('in'); io.unobserve(e.target); }
        });
    }, { threshold: 0.15, rootMargin: '0px 0px -80px 0px' });
    document.querySelectorAll('.rise, .rule').forEach(el => io.observe(el));

    function showSuccessModal() {
        const m = document.getElementById('successModal');
        m.classList.remove('hidden');
        requestAnimationFrame(() => m.classList.add('show'));
        document.body.style.overflow = 'hidden';
    }
    function closeSuccessModal() {
        const m = document.getElementById('successModal');
        m.classList.remove('show');
        setTimeout(() => m.classList.add('hidden'), 450);
        document.body.style.overflow = '';
    }
    document.addEventListener('keydown', e => {
        if (e.key === 'Escape' && !document.getElementById('successModal').classList.contains('hidden')) closeSuccessModal();
    });

    document.querySelectorAll('.lead-form-ajax').forEach(form => {
        form.addEventListener('submit', function (e) {
            e.preventDefault();

            const formData = new FormData(this);
            const submitBtn = this.querySelector('button[type="submit"]');
            const originalBtnText = submitBtn.innerHTML;

            submitBtn.disabled = true;
            submitBtn.innerHTML = 'Отправляем…';

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
</html>
<?php /**PATH D:\laragon\www\avtoblog\resources\views\home.blade.php ENDPATH**/ ?>
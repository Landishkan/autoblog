<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Отзывы — AvtoBlog</title>

    <link rel="icon" href="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 32 32'%3E%3Crect width='32' height='32' fill='%233D4047'/%3E%3Cg transform='translate(1,1)'%3E%3Cpath d='M2 20v-2c0-1 .8-1.9 1.8-2l2.5-.3C7.6 12.9 11 10.6 15 10.6c3.6 0 6.8 1.9 8.5 4.8l2.7.6c1.4.3 2.4 1.5 2.4 2.9V20c0 .8-.7 1.5-1.5 1.5h-1.9a3.2 3.2 0 0 1-6.3 0H11.1a3.2 3.2 0 0 1-6.3 0H3.5C2.7 21.5 2 20.8 2 20Z' fill='%23C4907C'/%3E%3Ccircle cx='8' cy='21.2' r='2.6' fill='%23B07D6A'/%3E%3Ccircle cx='22' cy='21.2' r='2.6' fill='%23B07D6A'/%3E%3C/g%3E%3C/svg%3E">

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
                        sand: '#FAF7F2', mist: '#EEF1EB', clay: '#C4907C', 'clay-dark': '#B07D6A',
                        steel: '#4A5D6B', ink: '#3D4047', sage: '#8BA89A', muted: '#7A7D82',
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
        body{ font-family:'Manrope', system-ui, sans-serif; overflow-x:hidden; background:var(--ink); color:var(--sand); }
        ::selection{ background:var(--clay); color:var(--ink); }

        .rise{ opacity:0; transform:translateY(20px); transition:opacity .9s var(--ease), transform .9s var(--ease); transition-delay:var(--d,0ms); }
        .rise.in{ opacity:1; transform:none; }
        .rule{ height:1px; background:var(--clay); opacity:.5; transform:scaleX(0); transform-origin:left; transition:transform 1.1s var(--ease); transition-delay:var(--d,0ms); }
        .rule.in{ transform:scaleX(1); }

        .mark{ width:30px; height:30px; display:block; overflow:visible; transition:transform .5s var(--ease); }
        .mark .mark-wheel{ transition:transform .6s var(--ease); transform-box:fill-box; transform-origin:center; }
        .logo:hover .mark{ transform:translateY(-2px); }
        .logo:hover .mark .mark-wheel{ transform:rotate(160deg); }

        .site-header{ transition:background .5s var(--ease), border-color .5s var(--ease); border-bottom:1px solid transparent; }
        .site-header.solid{ background:rgba(61,64,71,.9); backdrop-filter:blur(18px) saturate(150%); border-bottom-color:rgba(250,247,242,.09); }
        .nav-link{ position:relative; }
        .nav-link::after{ content:''; position:absolute; left:0; right:0; bottom:-6px; height:1px; background:var(--clay); transform:scaleX(0); transform-origin:left; transition:transform .5s var(--ease); }
        .nav-link:hover::after, .nav-link.active::after{ transform:scaleX(1); }
        .nav-link.active{ color:var(--sand); }

        #mobileMenu{ max-height:0; overflow:hidden; transition:max-height .6s var(--ease); }
        #mobileMenu.open{ max-height:360px; }
        .burger span{ display:block; width:22px; height:1px; background:currentColor; transition:transform .5s var(--ease), opacity .3s ease; }
        .burger.active span:nth-child(1){ transform:translateY(6px) rotate(45deg); }
        .burger.active span:nth-child(2){ opacity:0; }
        .burger.active span:nth-child(3){ transform:translateY(-6px) rotate(-45deg); }

        .page-head{ padding-top:8.5rem; padding-bottom:3rem; }
        @media (max-width:768px){ .page-head{ padding-top:7rem; padding-bottom:2rem; } }

        .btn{ position:relative; overflow:hidden; isolation:isolate; transition:color .5s var(--ease), border-color .5s var(--ease); }
        .btn::before{ content:''; position:absolute; inset:0; z-index:-1; background:var(--clay); transform:translateY(101%); transition:transform .6s var(--ease); }
        .btn:hover::before{ transform:translateY(0); }
        .btn-solid{
            background:var(--clay); color:var(--ink); box-shadow:0 10px 28px -8px rgba(196,144,124,.55);
            transition:background .4s var(--ease), box-shadow .4s var(--ease), transform .3s var(--ease);
        }
        .btn-solid:hover{ background:var(--clay-dark); box-shadow:0 14px 34px -8px rgba(196,144,124,.7); transform:translateY(-2px); }
        .btn-solid:active{ transform:translateY(0); }

        .fld{ position:relative; }
        .fld input, .fld select{
            width:100%; background:transparent; border:0; border-bottom:1px solid rgba(61,64,71,.22);
            padding:9px 0; font-size:15px; color:var(--ink); border-radius:0;
            transition:border-color .5s var(--ease);
        }
        .fld input::placeholder{ color:rgba(122,125,130,.7); }
        .fld input:focus, .fld select:focus{ outline:none; border-bottom-color:var(--clay); }
        .fld select{ appearance:none; cursor:pointer; }
        .fld .caret{ position:absolute; right:0; bottom:13px; pointer-events:none; color:var(--muted); }
        .panel{ background:var(--sand); color:var(--ink); }

        /* ---------- карточки отзывов ---------- */
        .rv-card{
            border:1px solid rgba(250,247,242,.1); background:var(--ink);
            transition:border-color .5s var(--ease), transform .5s var(--ease), box-shadow .5s var(--ease);
        }
        .rv-card:hover{ border-color:rgba(196,144,124,.4); transform:translateY(-4px); box-shadow:0 24px 50px -30px rgba(0,0,0,.6); }

        .swiper{ padding-bottom:8px !important; }
        .swiper-slide{ height:auto; }
        .swiper-button-prev, .swiper-button-next{
            width:50px !important; height:50px !important; border-radius:50% !important;
            border:1px solid rgba(250,247,242,.25); color:var(--sand) !important;
            transition:background .5s var(--ease), color .5s var(--ease), border-color .5s var(--ease);
            top:auto !important; bottom:-58px !important; margin:0 !important;
        }
        .swiper-button-prev{ left:calc(50% - 60px) !important; }
        .swiper-button-next{ left:calc(50% + 10px) !important; right:auto !important; }
        .swiper-button-prev:hover, .swiper-button-next:hover{ background:var(--clay); border-color:var(--clay); color:var(--ink) !important; }
        .swiper-button-prev::after, .swiper-button-next::after{ font-size:13px !important; font-weight:600 !important; }
        .swiper-button-disabled{ opacity:.25 !important; }

        /* ---------- пагинация (на случай роста числа отзывов) ---------- */
        .pg-wrap nav{ display:flex; justify-content:center; }
        .pg-wrap ul{ display:flex; align-items:center; gap:6px; list-style:none; }
        .pg-wrap a, .pg-wrap span{
            display:flex; align-items:center; justify-content:center; min-width:38px; height:38px;
            font-size:13px; color:var(--sand); opacity:.55; border:1px solid rgba(250,247,242,.15);
            transition:all .35s var(--ease);
        }
        .pg-wrap a:hover{ opacity:1; border-color:var(--clay); }
        .pg-wrap span[aria-current="page"] span{ background:var(--clay); color:var(--ink); opacity:1; border-color:var(--clay); }
        .pg-wrap svg{ display:none; }

        #successModal .panel-modal, #leadModal .panel-modal{ opacity:0; transform:translate(-50%, calc(-50% + 14px)); transition:all .6s var(--ease); }
        #successModal.show .panel-modal, #leadModal.show .panel-modal{ opacity:1; transform:translate(-50%, -50%); }
        #successModal .veil, #leadModal .veil{ opacity:0; transition:opacity .5s ease; }
        #successModal.show .veil, #leadModal.show .veil{ opacity:1; }
        .draw{ stroke-dasharray:26; stroke-dashoffset:26; animation:draw .8s var(--ease) .25s forwards; }
        @keyframes draw{ to{ stroke-dashoffset:0 } }

        @media (prefers-reduced-motion:reduce){
            *,*::before,*::after{ animation-duration:.01ms !important; transition-duration:.01ms !important; }
            .rise{ opacity:1 !important; transform:none !important; }
            .rule{ transform:scaleX(1) !important; }
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
                    <path class="mark-body" d="M2 20v-2c0-1 .8-1.9 1.8-2l2.5-.3C7.6 12.9 11 10.6 15 10.6c3.6 0 6.8 1.9 8.5 4.8l2.7.6c1.4.3 2.4 1.5 2.4 2.9V20c0 .8-.7 1.5-1.5 1.5h-1.9a3.2 3.2 0 0 1-6.3 0H11.1a3.2 3.2 0 0 1-6.3 0H3.5C2.7 21.5 2 20.8 2 20Z" fill="#C4907C"/>
                    <circle class="mark-wheel" cx="8" cy="21.2" r="2.6" fill="#B07D6A"/>
                    <circle class="mark-wheel" cx="22" cy="21.2" r="2.6" fill="#B07D6A"/>
                </svg>
                <span class="font-display font-semibold text-[22px] leading-none tracking-tight">Avto<span class="text-clay">Blog</span></span>
            </a>

            <nav class="hidden lg:flex items-center gap-10">
                <a href="/" class="nav-link text-[11px] uppercase tracking-label font-semibold text-sand/65 hover:text-sand transition-colors duration-500">Главная</a>
                <a href="/credit-trade-in" class="nav-link text-[11px] uppercase tracking-label font-semibold text-sand/65 hover:text-sand transition-colors duration-500">Кредит / Trade-In</a>
                <a href="/chatbot" class="nav-link text-[11px] uppercase tracking-label font-semibold text-sand/65 hover:text-sand transition-colors duration-500">Чат-бот</a>
                <a href="/reviews" class="nav-link active text-[11px] uppercase tracking-label font-semibold text-sand transition-colors duration-500">Отзывы</a>
            </nav>

            <div class="flex items-center gap-7">
                <a href="tel:88001234567" class="hidden md:block font-display font-semibold text-[17px] hover:text-clay transition-colors duration-500">8-800-123-45-67</a>
                <button onclick="openLeadModal()" class="btn hidden lg:inline-flex items-center border border-sand/30 text-sand hover:text-ink px-7 py-3 text-[11px] uppercase tracking-label font-semibold">
                    Оставить заявку
                </button>
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
            <a href="/reviews" class="block text-[11px] uppercase tracking-label font-semibold text-clay">Отзывы</a>
            <button onclick="openLeadModal()" class="block w-full text-center border border-clay text-clay py-3.5 text-[11px] uppercase tracking-label font-semibold">Оставить заявку</button>
        </div>
    </div>
</header>

<!-- ============================== ШАПКА СТРАНИЦЫ ============================== -->
<section class="page-head">
    <div class="max-w-[1400px] mx-auto px-6 lg:px-12 text-center">
        <p class="rise text-[10px] uppercase tracking-eyebrow font-semibold text-clay mb-6">Отзывы</p>
        <h1 class="rise font-display font-extrabold leading-[1.05] tracking-tight text-[clamp(2.2rem,4.6vw,3.6rem)]" style="--d:100ms">
            Что говорят наши <span class="text-clay">клиенты</span>
        </h1>
        <p class="rise max-w-xl mx-auto text-sand/60 text-[16px] leading-relaxed mt-6" style="--d:220ms">
            Реальные истории людей, которые продали или обменяли свои авто через AvtoBlog.
        </p>
    </div>
</section>

<!-- ============================== КАРУСЕЛЬ ============================== -->
<section class="pb-24 lg:pb-28">
    <div class="max-w-[1400px] mx-auto px-6 lg:px-12">
        <div class="rise relative pb-16" style="--d:180ms">
            <div class="swiper reviewsSwiper">
                <div class="swiper-wrapper">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $reviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $review): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                    <div class="swiper-slide">
                        <figure class="rv-card h-full flex flex-col p-8">
                            <div class="flex gap-1 mb-6">
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php for($i = 1; $i <= 5; $i++): ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                                    <svg class="w-3.5 h-3.5 <?php echo e($i <= $review->rating ? 'text-clay' : 'text-sand/15'); ?>" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                    </svg>
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endfor; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                            </div>

                            <blockquote class="font-medium text-[17px] leading-[1.6] text-sand/95 flex-grow">
                                <?php echo e($review->text); ?>

                            </blockquote>

                            <figcaption class="flex items-center gap-4 mt-8 pt-6 border-t border-sand/10">
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($review->client_photo): ?>
                                    <img src="<?php echo e(Storage::url($review->client_photo)); ?>" class="w-11 h-11 rounded-full object-cover grayscale" alt="<?php echo e($review->client_name); ?>">
                                <?php else: ?>
                                    <span class="w-11 h-11 rounded-full border border-clay/45 flex items-center justify-center font-display font-bold text-[16px] text-clay">
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

<!-- ============================== ВСЕ ОТЗЫВЫ СЕТКОЙ ============================== -->
<section class="pb-24 lg:pb-28 border-t border-sand/8 pt-20">
    <div class="max-w-[1400px] mx-auto px-6 lg:px-12">
        <div class="max-w-2xl mb-14">
            <p class="rise text-[10px] uppercase tracking-eyebrow font-semibold text-clay mb-6">Полный список</p>
            <h2 class="rise font-display font-bold text-[clamp(1.8rem,3.4vw,2.6rem)] leading-[1.05] tracking-tight" style="--d:100ms">Все отзывы</h2>
            <div class="rule mt-8 max-w-[90px]" style="--d:240ms"></div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $reviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $review): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
            <div class="rv-card p-7 flex flex-col rise" style="--d:<?php echo e(($loop->index % 6) * 90); ?>ms">
                <div class="flex gap-1 mb-5">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php for($i = 1; $i <= 5; $i++): ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                        <svg class="w-3.5 h-3.5 <?php echo e($i <= $review->rating ? 'text-clay' : 'text-sand/15'); ?>" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                        </svg>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endfor; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                </div>

                <p class="text-sand/75 text-[14px] leading-relaxed flex-grow">
                    <?php echo e($review->text); ?>

                </p>

                <div class="flex items-center gap-3 mt-7 pt-5 border-t border-sand/10">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($review->client_photo): ?>
                        <img src="<?php echo e(Storage::url($review->client_photo)); ?>" class="w-9 h-9 rounded-full object-cover grayscale" alt="<?php echo e($review->client_name); ?>">
                    <?php else: ?>
                        <span class="w-9 h-9 rounded-full border border-clay/45 flex items-center justify-center font-display font-bold text-[13px] text-clay">
                            <?php echo e(mb_substr($review->client_name, 0, 1)); ?>

                        </span>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    <span>
                        <span class="block text-[13px] font-semibold"><?php echo e($review->client_name); ?></span>
                        <span class="block text-[10px] uppercase tracking-label text-sand/40 mt-0.5"><?php echo e($review->car_model); ?></span>
                    </span>
                </div>
            </div>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
        </div>

        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($reviews->hasPages()): ?>
        <div class="pg-wrap mt-14">
            <?php echo e($reviews->links()); ?>

        </div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    </div>
</section>

<!-- ============================== FOOTER ============================== -->
<footer class="border-t border-sand/10 pt-20 lg:pt-28 pb-10">
    <div class="max-w-[1400px] mx-auto px-6 lg:px-12">
        <div class="grid md:grid-cols-3 gap-14 pb-16 lg:pb-20">
            <div>
                <a href="/" class="logo inline-flex items-center gap-3.5 mb-6">
                    <svg class="mark" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path class="mark-body" d="M2 20v-2c0-1 .8-1.9 1.8-2l2.5-.3C7.6 12.9 11 10.6 15 10.6c3.6 0 6.8 1.9 8.5 4.8l2.7.6c1.4.3 2.4 1.5 2.4 2.9V20c0 .8-.7 1.5-1.5 1.5h-1.9a3.2 3.2 0 0 1-6.3 0H11.1a3.2 3.2 0 0 1-6.3 0H3.5C2.7 21.5 2 20.8 2 20Z" fill="#C4907C"/>
                        <circle class="mark-wheel" cx="8" cy="21.2" r="2.6" fill="#B07D6A"/>
                        <circle class="mark-wheel" cx="22" cy="21.2" r="2.6" fill="#B07D6A"/>
                    </svg>
                    <span class="font-display font-semibold text-[22px] leading-none tracking-tight">Avto<span class="text-clay">Blog</span></span>
                </a>
                <p class="text-sand/40 text-[15px] leading-relaxed max-w-xs">Сервис продажи, обмена и ремонта автомобилей.</p>
            </div>
            <div>
                <p class="text-[10px] uppercase tracking-eyebrow font-semibold text-sand/35 mb-7">Контакты</p>
                <a href="tel:88001234567" class="font-display font-bold text-[28px] leading-none hover:text-clay transition-colors duration-500">8-800-123-45-67</a>
                <p class="text-sand/40 text-[15px] mt-6">offer@avtoblog.ru</p>
                <p class="text-sand/40 text-[15px] mt-1.5">г. Казань, ул. Примерная, 123</p>
                <a href="https://t.me/AVTOBLOGRF" target="_blank" rel="noopener" class="inline-flex items-center gap-2 mt-4 text-sand/40 text-[15px] hover:text-clay transition-colors duration-500">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor"><path d="M12 0C5.373 0 0 5.373 0 12s5.373 12 12 12 12-5.373 12-12S18.627 0 12 0zm5.568 8.16c-.18 1.897-.962 6.502-1.36 8.627-.168.9-.499 1.201-.82 1.23-.696.064-1.225-.46-1.9-.902-1.056-.693-1.653-1.124-2.678-1.8-1.185-.78-.417-1.209.258-1.91.177-.184 3.247-2.977 3.307-3.23.007-.032.014-.15-.056-.212-.07-.062-.174-.041-.249-.024-.106.024-1.793 1.14-5.061 3.345-.479.329-.913.489-1.302.48-.428-.009-1.252-.242-1.865-.442-.752-.244-1.349-.374-1.297-.789.027-.216.325-.437.893-.663 3.498-1.524 5.831-2.529 6.998-3.014 3.332-1.386 4.023-1.627 4.475-1.635.099-.002.321.023.465.14.121.099.154.232.17.325.016.093.036.306.02.472z"/></svg>
                    @AVTOBLOGRF
                </a>
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

<!-- ============================== МОДАЛКИ ============================== -->
<div id="leadModal" class="fixed inset-0 z-[60] hidden">
    <div class="veil absolute inset-0 bg-ink/85 backdrop-blur-sm" onclick="closeLeadModal()"></div>
    <div class="panel-modal panel absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[92%] max-w-md p-8 lg:p-10">
        <button onclick="closeLeadModal()" class="absolute top-5 right-5 text-muted hover:text-ink transition-colors">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="1.6" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>
        </button>
        <h2 class="font-display font-bold text-[26px] leading-tight mb-6">Оставить заявку</h2>

        <form class="lead-form-ajax space-y-4" data-type="general">
            <?php echo csrf_field(); ?>
            <input type="hidden" name="service_type" value="general">
            <div class="fld">
                <label class="block text-[10px] uppercase tracking-label font-semibold text-muted mb-1">Тип лица</label>
                <select name="entity_type">
                    <option value="physical">Физическое лицо</option>
                    <option value="legal">Юридическое лицо</option>
                </select>
                <svg class="caret w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M6 9l6 6 6-6"/></svg>
            </div>
            <div class="fld">
                <label class="block text-[10px] uppercase tracking-label font-semibold text-muted mb-1">Имя</label>
                <input type="text" name="name" placeholder="Ваше имя">
            </div>
            <div class="fld">
                <label class="block text-[10px] uppercase tracking-label font-semibold text-muted mb-1">Телефон</label>
                <input type="tel" name="phone" placeholder="+7 (___) ___-__-__" required>
            </div>
            <button type="submit" class="btn-solid w-full py-3.5 text-[11px] uppercase tracking-label font-semibold mt-2">
                Отправить заявку
            </button>
        </form>
    </div>
</div>

<div id="successModal" class="fixed inset-0 z-[60] hidden">
    <div class="veil absolute inset-0 bg-ink/85 backdrop-blur-sm" onclick="closeSuccessModal()"></div>
    <div class="panel-modal panel absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[92%] max-w-md p-10 text-center">
        <svg class="w-10 h-10 mx-auto mb-7 text-sage" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path class="draw" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M5 13l4 4L19 7"/>
        </svg>
        <h2 class="font-display font-bold text-[28px] leading-tight mb-4">Заявка отправлена</h2>
        <p class="text-muted text-[15px] leading-relaxed mb-9">Наш менеджер свяжется с вами в ближайшее время для уточнения деталей.</p>
        <button onclick="closeSuccessModal()" class="btn w-full border border-ink text-ink hover:text-sand py-3.5 text-[11px] uppercase tracking-label font-semibold">
            Отлично, спасибо!
        </button>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script>
    const menuBtn = document.getElementById('menuBtn');
    const mobileMenu = document.getElementById('mobileMenu');
    menuBtn.addEventListener('click', () => { mobileMenu.classList.toggle('open'); menuBtn.classList.toggle('active'); });
    mobileMenu.querySelectorAll('a,button').forEach(a => a.addEventListener('click', () => { mobileMenu.classList.remove('open'); menuBtn.classList.remove('active'); }));

    const header = document.getElementById('siteHeader');
    window.addEventListener('scroll', () => header.classList.toggle('solid', window.scrollY > 40), { passive: true });

    const io = new IntersectionObserver((entries) => {
        entries.forEach(e => { if (e.isIntersecting) { e.target.classList.add('in'); io.unobserve(e.target); } });
    }, { threshold: 0.15, rootMargin: '0px 0px -80px 0px' });
    document.querySelectorAll('.rise, .rule').forEach(el => io.observe(el));

    new Swiper('.reviewsSwiper', {
        slidesPerView: 1,
        spaceBetween: 24,
        speed: 700,
        navigation: { nextEl: '.swiper-button-next', prevEl: '.swiper-button-prev' },
        breakpoints: {
            768:  { slidesPerView: 2, spaceBetween: 24 },
            1200: { slidesPerView: 3, spaceBetween: 28 }
        }
    });

    function openLeadModal() {
        const m = document.getElementById('leadModal');
        m.classList.remove('hidden'); requestAnimationFrame(() => m.classList.add('show'));
        document.body.style.overflow = 'hidden';
    }
    function closeLeadModal() {
        const m = document.getElementById('leadModal');
        m.classList.remove('show'); setTimeout(() => m.classList.add('hidden'), 450);
        document.body.style.overflow = '';
    }
    function showSuccessModal() {
        closeLeadModal();
        const m = document.getElementById('successModal');
        m.classList.remove('hidden'); requestAnimationFrame(() => m.classList.add('show'));
        document.body.style.overflow = 'hidden';
    }
    function closeSuccessModal() {
        const m = document.getElementById('successModal');
        m.classList.remove('show'); setTimeout(() => m.classList.add('hidden'), 450);
        document.body.style.overflow = '';
    }

    document.querySelectorAll('.lead-form-ajax').forEach(form => {
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            const formData = new FormData(this);
            const submitBtn = this.querySelector('button[type="submit"]');
            const originalBtnText = submitBtn.innerHTML;
            submitBtn.disabled = true;
            submitBtn.innerHTML = 'Отправляем…';

            fetch('<?php echo e(route("leads.store")); ?>', {
                method: 'POST', body: formData,
                headers: { 'X-Requested-With': 'XMLHttpRequest', 'Accept': 'application/json' }
            })
            .then(async response => {
                const contentType = response.headers.get("content-type");
                if (contentType && contentType.indexOf("application/json") !== -1) return response.json();
                const errorText = await response.text();
                console.error("Сервер вернул HTML:", errorText);
                throw new Error("Ошибка сервера");
            })
            .then(data => {
                if (data.success) { form.reset(); showSuccessModal(); }
                else {
                    let errorMsg = data.message || "Проверьте правильность заполнения полей.";
                    if (data.errors) errorMsg = Object.values(data.errors).flat().join('\n');
                    alert(errorMsg);
                }
            })
            .catch(error => { console.error('Ошибка:', error); alert("Произошла ошибка. Попробуйте позже."); })
            .finally(() => { submitBtn.disabled = false; submitBtn.innerHTML = originalBtnText; });
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
<?php /**PATH /Users/lianavaleeva/Herd/autoblog/resources/views/reviews.blade.php ENDPATH**/ ?>
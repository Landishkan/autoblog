<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Кредит / Trade-In — AvtoBlog</title>

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

        .mark{ width:30px; height:30px; display:block; overflow:visible; }
        .mark .bar{ transition:transform .6s var(--ease); transform-box:fill-box; transform-origin:center; }
        .logo:hover .mark .bar-l{ transform:translateX(-1.5px); }
        .logo:hover .mark .bar-r{ transform:translateX(1.5px); }
        .logo:hover .mark .bar-x{ transform:scaleX(1.15); }

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

        /* компактная шапка страницы вместо hero-видео */
        .page-head{ padding-top:9.5rem; padding-bottom:3.5rem; border-bottom:1px solid rgba(250,247,242,.08); }
        @media (max-width:768px){ .page-head{ padding-top:7.5rem; padding-bottom:2.5rem; } }

        /* переключатель Кредит / Trade-In */
        .seg{ display:inline-flex; border:1px solid rgba(250,247,242,.18); }
        .seg button{
            padding:.9rem 2.2rem; font-size:11px; letter-spacing:.18em; text-transform:uppercase; font-weight:600;
            color:rgba(250,247,242,.5); background:transparent; transition:color .4s var(--ease), background .4s var(--ease);
            position:relative;
        }
        .seg button.active{ color:var(--ink); background:var(--clay); }
        .seg button:not(.active):hover{ color:var(--sand); }

        /* светлые карточки-панели (форма/калькулятор) на тёмном фоне */
        .panel{ background:var(--sand); color:var(--ink); }

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

        .rng{ -webkit-appearance:none; appearance:none; width:100%; height:2px; background:rgba(61,64,71,.18); outline:none; }
        .rng::-webkit-slider-thumb{ -webkit-appearance:none; width:16px; height:16px; border-radius:50%; background:var(--clay); cursor:pointer; transition:transform .3s var(--ease); }
        .rng::-webkit-slider-thumb:hover{ transform:scale(1.15); }
        .rng::-moz-range-thumb{ width:16px; height:16px; border:0; border-radius:50%; background:var(--clay); cursor:pointer; }

        .btn{ position:relative; overflow:hidden; isolation:isolate; transition:color .5s var(--ease), border-color .5s var(--ease); }
        .btn::before{ content:''; position:absolute; inset:0; z-index:-1; background:var(--clay); transform:translateY(101%); transition:transform .6s var(--ease); }
        .btn:hover::before{ transform:translateY(0); }
        .btn-solid{
            background:var(--clay); color:var(--ink); box-shadow:0 10px 28px -8px rgba(196,144,124,.55);
            transition:background .4s var(--ease), box-shadow .4s var(--ease), transform .3s var(--ease);
        }
        .btn-solid:hover{ background:var(--clay-dark); box-shadow:0 14px 34px -8px rgba(196,144,124,.7); transform:translateY(-2px); }
        .btn-solid:active{ transform:translateY(0); }

        .hair-grid{ display:grid; gap:1px; background:rgba(196,144,124,.22); }
        .hair-grid > *{ background:var(--ink); }

        .ex-card{ border:1px solid rgba(250,247,242,.1); transition:border-color .5s var(--ease), transform .5s var(--ease); }
        .ex-card:hover{ border-color:rgba(196,144,124,.45); transform:translateY(-4px); }
        .ex-card img{ filter:grayscale(60%); transition:filter .6s var(--ease); }
        .ex-card:hover img{ filter:grayscale(0%); }

        .swiper-slide{ height:auto; }

        #successModal .panel-modal, #leadModal .panel-modal{ opacity:0; transform:translateY(14px); transition:all .6s var(--ease); }
        #successModal.show .panel-modal, #leadModal.show .panel-modal{ opacity:1; transform:none; }
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
                    <path class="bar bar-l" d="M5 25L14.3 5.6a.8.8 0 0 1 1.4 0L25 25" stroke="#C4907C" stroke-width="2.6" stroke-linecap="round" stroke-linejoin="round"/>
                    <line class="bar bar-x" x1="10" y1="16.4" x2="20" y2="16.4" stroke="#C4907C" stroke-width="2.6" stroke-linecap="round"/>
                </svg>
                <span class="font-display font-semibold text-[22px] leading-none tracking-tight">Avto<span class="text-clay">Blog</span></span>
            </a>

            <nav class="hidden lg:flex items-center gap-10">
                <a href="/" class="nav-link text-[11px] uppercase tracking-label font-semibold text-sand/65 hover:text-sand transition-colors duration-500">Главная</a>
                <a href="/credit-trade-in" class="nav-link active text-[11px] uppercase tracking-label font-semibold text-sand transition-colors duration-500">Кредит / Trade-In</a>
                <a href="/chatbot" class="nav-link text-[11px] uppercase tracking-label font-semibold text-sand/65 hover:text-sand transition-colors duration-500">Чат-бот</a>
                <a href="/reviews" class="nav-link text-[11px] uppercase tracking-label font-semibold text-sand/65 hover:text-sand transition-colors duration-500">Отзывы</a>
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
            <a href="/credit-trade-in" class="block text-[11px] uppercase tracking-label font-semibold text-clay">Кредит / Trade-In</a>
            <a href="/chatbot" class="block text-[11px] uppercase tracking-label font-semibold text-sand/65">Чат-бот</a>
            <a href="/reviews" class="block text-[11px] uppercase tracking-label font-semibold text-sand/65">Отзывы</a>
            <button onclick="openLeadModal()" class="block w-full text-center border border-clay text-clay py-3.5 text-[11px] uppercase tracking-label font-semibold">Оставить заявку</button>
        </div>
    </div>
</header>

<!-- ============================== ШАПКА СТРАНИЦЫ (без видео) ============================== -->
<section class="page-head">
    <div class="max-w-[1400px] mx-auto px-6 lg:px-12">
        <p class="rise text-[10px] uppercase tracking-eyebrow font-semibold text-clay mb-6">Финансовые решения</p>
        <h1 class="rise font-display font-extrabold leading-[1] tracking-tight text-[clamp(2.2rem,4.6vw,3.6rem)]" style="--d:100ms">
            Кредит на авто <span class="text-clay">и</span> Trade-In
        </h1>
        <div class="rule mt-8 max-w-[100px]" style="--d:280ms"></div>
        <p class="rise max-w-lg text-sand/60 text-[16px] leading-relaxed mt-6" style="--d:220ms">
            Оформите кредит по ставке от 4.9% или обменяйте своё авто на новое с доплатой — без визита в банк.
        </p>
    </div>
</section>

<!-- ============================== ОСНОВНОЙ БЛОК ============================== -->
<section class="py-16 lg:py-20">
    <div class="max-w-[1400px] mx-auto px-6 lg:px-12">

        <!-- переключатель -->
        <div class="rise mb-12" style="--d:120ms">
            <div class="seg">
                <button id="creditTab" class="active">Кредит</button>
                <button id="tradeInTab">Trade-In</button>
            </div>
        </div>

        <div class="grid lg:grid-cols-12 gap-8 lg:gap-10 mb-20">

            <!-- форма заявки -->
            <div id="lead-form" class="rise lg:col-span-5" style="--d:180ms">
                <div class="panel p-7 lg:p-8 h-full">
                    <p class="text-[10px] uppercase tracking-eyebrow font-semibold text-clay">Заявка</p>
                    <h2 class="font-display font-bold text-[26px] leading-tight mt-2 mb-6">Оставьте заявку</h2>

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

            <!-- калькулятор -->
            <div class="rise lg:col-span-7" style="--d:240ms">
                <div class="panel p-7 lg:p-8 h-full">
                    <p class="text-[10px] uppercase tracking-eyebrow font-semibold text-clay">Расчёт онлайн</p>
                    <h2 class="font-display font-bold text-[26px] leading-tight mt-2 mb-7">Рассчитайте сумму</h2>

                    <div id="creditCalculator">
                        <div class="space-y-7">
                            <div class="fld">
                                <label class="block text-[10px] uppercase tracking-label font-semibold text-muted mb-1">Тип заёмщика</label>
                                <select id="calcEntityType">
                                    <option value="physical">Физическое лицо (ставка от 4.9%)</option>
                                    <option value="legal">Юридическое лицо (ставка от 8.9%)</option>
                                </select>
                                <svg class="caret w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M6 9l6 6 6-6"/></svg>
                            </div>

                            <div>
                                <label class="block text-[10px] uppercase tracking-label font-semibold text-muted mb-3">Стоимость авто</label>
                                <input type="range" id="creditAmount" min="500000" max="100000000" step="100000" value="20000000" class="rng">
                                <div class="flex justify-between text-[11px] text-muted mt-3">
                                    <span>500 000 ₽</span>
                                    <span id="creditAmountValue" class="font-display font-semibold text-[15px] text-clay">20 000 000 ₽</span>
                                    <span>100 000 000 ₽</span>
                                </div>
                            </div>

                            <div>
                                <label class="block text-[10px] uppercase tracking-label font-semibold text-muted mb-3">Срок кредита</label>
                                <input type="range" id="creditTerm" min="12" max="84" step="12" value="36" class="rng">
                                <div class="flex justify-between text-[11px] text-muted mt-3">
                                    <span>12 мес</span>
                                    <span id="creditTermValue" class="font-display font-semibold text-[15px] text-clay">36 мес</span>
                                    <span>84 мес</span>
                                </div>
                            </div>

                            <div class="border-t border-ink/10 pt-6 mt-2">
                                <div class="text-[10px] uppercase tracking-label font-semibold text-muted mb-2">Ежемесячный платёж</div>
                                <div id="creditMonthly" class="font-display font-bold text-[38px] leading-none text-clay">0 ₽</div>
                            </div>
                        </div>
                    </div>

                    <div id="tradeInCalculator" class="hidden">
                        <div class="space-y-7">
                            <div>
                                <label class="block text-[10px] uppercase tracking-label font-semibold text-muted mb-3">Стоимость вашего авто</label>
                                <input type="range" id="tradeInCarPrice" min="100000" max="5000000" step="50000" value="1000000" class="rng">
                                <div class="flex justify-between text-[11px] text-muted mt-3">
                                    <span>100 000 ₽</span>
                                    <span id="tradeInCarPriceValue" class="font-display font-semibold text-[15px] text-clay">1 000 000 ₽</span>
                                    <span>5 000 000 ₽</span>
                                </div>
                            </div>

                            <div>
                                <label class="block text-[10px] uppercase tracking-label font-semibold text-muted mb-3">Стоимость нового авто</label>
                                <input type="range" id="tradeInNewPrice" min="500000" max="10000000" step="100000" value="3000000" class="rng">
                                <div class="flex justify-between text-[11px] text-muted mt-3">
                                    <span>500 000 ₽</span>
                                    <span id="tradeInNewPriceValue" class="font-display font-semibold text-[15px] text-clay">3 000 000 ₽</span>
                                    <span>10 000 000 ₽</span>
                                </div>
                            </div>

                            <div class="border-t border-ink/10 pt-6 mt-2">
                                <div class="text-[10px] uppercase tracking-label font-semibold text-muted mb-2">Ваша выгода</div>
                                <div id="tradeInBenefit" class="font-display font-bold text-[38px] leading-none text-sage">+2 100 000 ₽</div>
                                <div class="text-[12px] text-muted mt-2">Разница с учётом оценки вашего авто</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- преимущества -->
        <div class="mb-20">
            <div class="max-w-2xl mb-12">
                <p class="rise text-[10px] uppercase tracking-eyebrow font-semibold text-clay mb-6">Почему это выгодно</p>
                <h2 class="rise font-display font-bold text-[clamp(1.8rem,3.4vw,2.6rem)] leading-[1.05] tracking-tight" style="--d:100ms">Почему это вам подойдёт</h2>
                <div class="rule mt-8 max-w-[90px]" style="--d:240ms"></div>
            </div>

            <div id="creditBenefits" class="hair-grid md:grid-cols-2">
                <div class="rise p-8 lg:p-10 flex items-start gap-5" style="--d:0ms">
                    <svg class="w-6 h-6 text-clay shrink-0 mt-1" fill="none" stroke="currentColor" stroke-width="1.4" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
                    <div><h3 class="font-display font-bold text-[19px] mb-2">Низкая ставка</h3><p class="text-sand/50 text-[14px] leading-relaxed">От 4.9% годовых для зарплатных клиентов</p></div>
                </div>
                <div class="rise p-8 lg:p-10 flex items-start gap-5" style="--d:80ms">
                    <svg class="w-6 h-6 text-clay shrink-0 mt-1" fill="none" stroke="currentColor" stroke-width="1.4" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
                    <div><h3 class="font-display font-bold text-[19px] mb-2">Без первоначального взноса</h3><p class="text-sand/50 text-[14px] leading-relaxed">Финансирование до 100% стоимости авто</p></div>
                </div>
                <div class="rise p-8 lg:p-10 flex items-start gap-5" style="--d:160ms">
                    <svg class="w-6 h-6 text-clay shrink-0 mt-1" fill="none" stroke="currentColor" stroke-width="1.4" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
                    <div><h3 class="font-display font-bold text-[19px] mb-2">Решение за 15 минут</h3><p class="text-sand/50 text-[14px] leading-relaxed">Онлайн-одобрение без визита в банк</p></div>
                </div>
                <div class="rise p-8 lg:p-10 flex items-start gap-5" style="--d:240ms">
                    <svg class="w-6 h-6 text-clay shrink-0 mt-1" fill="none" stroke="currentColor" stroke-width="1.4" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
                    <div><h3 class="font-display font-bold text-[19px] mb-2">Срок до 7 лет</h3><p class="text-sand/50 text-[14px] leading-relaxed">Гибкие условия погашения</p></div>
                </div>
            </div>

            <div id="tradeInBenefits" class="hidden hair-grid md:grid-cols-2">
                <div class="p-8 lg:p-10 flex items-start gap-5">
                    <svg class="w-6 h-6 text-clay shrink-0 mt-1" fill="none" stroke="currentColor" stroke-width="1.4" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
                    <div><h3 class="font-display font-bold text-[19px] mb-2">Быстрая оценка</h3><p class="text-sand/50 text-[14px] leading-relaxed">Узнайте стоимость вашего авто за 5 минут</p></div>
                </div>
                <div class="p-8 lg:p-10 flex items-start gap-5">
                    <svg class="w-6 h-6 text-clay shrink-0 mt-1" fill="none" stroke="currentColor" stroke-width="1.4" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
                    <div><h3 class="font-display font-bold text-[19px] mb-2">Выгода до 15%</h3><p class="text-sand/50 text-[14px] leading-relaxed">По сравнению с обычной продажей</p></div>
                </div>
                <div class="p-8 lg:p-10 flex items-start gap-5">
                    <svg class="w-6 h-6 text-clay shrink-0 mt-1" fill="none" stroke="currentColor" stroke-width="1.4" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
                    <div><h3 class="font-display font-bold text-[19px] mb-2">Безопасная сделка</h3><p class="text-sand/50 text-[14px] leading-relaxed">Все документы оформляем мы</p></div>
                </div>
                <div class="p-8 lg:p-10 flex items-start gap-5">
                    <svg class="w-6 h-6 text-clay shrink-0 mt-1" fill="none" stroke="currentColor" stroke-width="1.4" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
                    <div><h3 class="font-display font-bold text-[19px] mb-2">Обмен на любое авто</h3><p class="text-sand/50 text-[14px] leading-relaxed">Выбирайте из нашего каталога</p></div>
                </div>
            </div>
        </div>

        <!-- примеры сделок -->
        <div class="mb-20">
            <div class="max-w-2xl mb-12">
                <p class="rise text-[10px] uppercase tracking-eyebrow font-semibold text-clay mb-6">Кейсы</p>
                <h2 class="rise font-display font-bold text-[clamp(1.8rem,3.4vw,2.6rem)] leading-[1.05] tracking-tight" style="--d:100ms">Примеры сделок</h2>
                <div class="rule mt-8 max-w-[90px]" style="--d:240ms"></div>
            </div>

            <div id="creditExamples" class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $creditExamples; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $example): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                <div class="ex-card rise overflow-hidden" style="--d:<?php echo e($loop->index * 100); ?>ms">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($example->image): ?>
                        <img src="<?php echo e(Storage::url($example->image)); ?>" class="w-full h-48 object-cover" alt="<?php echo e($example->title); ?>">
                    <?php else: ?>
                        <div class="w-full h-48 bg-sand/5 flex items-center justify-center text-sand/20 text-[13px] uppercase tracking-label">Нет фото</div>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    <div class="p-6">
                        <h3 class="font-display font-bold text-[18px] mb-2"><?php echo e($example->title); ?></h3>
                        <p class="text-sand/50 text-[14px] leading-relaxed"><?php echo e($example->description); ?></p>
                    </div>
                </div>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
            </div>

            <div id="tradeInExamples" class="hidden grid grid-cols-1 md:grid-cols-3 gap-6">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $tradeInExamples; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $example): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                <div class="ex-card overflow-hidden">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($example->image): ?>
                        <img src="<?php echo e(Storage::url($example->image)); ?>" class="w-full h-48 object-cover" alt="<?php echo e($example->title); ?>">
                    <?php else: ?>
                        <div class="w-full h-48 bg-sand/5 flex items-center justify-center text-sand/20 text-[13px] uppercase tracking-label">Нет фото</div>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    <div class="p-6">
                        <h3 class="font-display font-bold text-[18px] mb-2"><?php echo e($example->title); ?></h3>
                        <p class="text-sand/50 text-[14px] leading-relaxed"><?php echo e($example->description); ?></p>
                    </div>
                </div>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
            </div>
        </div>

        <!-- отзывы -->
        <div class="border-t border-sand/8 pt-16 lg:pt-20">
            <div class="max-w-2xl mb-12">
                <p class="rise text-[10px] uppercase tracking-eyebrow font-semibold text-clay mb-6">Отзывы</p>
                <h2 class="rise font-display font-bold text-[clamp(1.8rem,3.4vw,2.6rem)] leading-[1.05] tracking-tight" style="--d:100ms">Отзывы клиентов</h2>
                <div class="rule mt-8 max-w-[90px]" style="--d:240ms"></div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-x-10 gap-y-10">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $reviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $review): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                <figure class="rise h-full flex flex-col border-t border-sand/15 pt-8" style="--d:<?php echo e($loop->index * 100); ?>ms">
                    <blockquote class="font-medium text-[17px] leading-[1.6] text-sand/95 flex-grow">
                        <?php echo e($review->text); ?>

                    </blockquote>
                    <figcaption class="flex items-center gap-4 mt-8 pt-6 border-t border-sand/10">
                        <span class="w-11 h-11 rounded-full border border-clay/45 flex items-center justify-center font-display font-bold text-[17px] text-clay">
                            <?php echo e(mb_substr($review->client_name, 0, 1)); ?>

                        </span>
                        <span>
                            <span class="block text-[13px] font-semibold"><?php echo e($review->client_name); ?></span>
                            <span class="block text-[10px] uppercase tracking-label text-sand/40 mt-1"><?php echo e($review->car_model); ?></span>
                        </span>
                    </figcaption>
                </figure>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
            </div>
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
                    <span class="font-display font-semibold text-[22px] leading-none tracking-tight">Avto<span class="text-clay">Blog</span></span>
                </a>
                <p class="text-sand/40 text-[15px] leading-relaxed max-w-xs">Сервис продажи и обмена автомобилей.</p>
            </div>
            <div>
                <p class="text-[10px] uppercase tracking-eyebrow font-semibold text-sand/35 mb-7">Контакты</p>
                <a href="tel:88001234567" class="font-display font-bold text-[28px] leading-none hover:text-clay transition-colors duration-500">8-800-123-45-67</a>
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

    /* переключатель Кредит / Trade-In */
    const creditTab = document.getElementById('creditTab');
    const tradeInTab = document.getElementById('tradeInTab');
    const creditCalculator = document.getElementById('creditCalculator');
    const tradeInCalculator = document.getElementById('tradeInCalculator');
    const creditBenefits = document.getElementById('creditBenefits');
    const tradeInBenefits = document.getElementById('tradeInBenefits');
    const creditExamples = document.getElementById('creditExamples');
    const tradeInExamples = document.getElementById('tradeInExamples');

    creditTab.addEventListener('click', () => {
        creditTab.classList.add('active'); tradeInTab.classList.remove('active');
        creditCalculator.classList.remove('hidden'); tradeInCalculator.classList.add('hidden');
        creditBenefits.classList.remove('hidden'); tradeInBenefits.classList.add('hidden');
        creditExamples.classList.remove('hidden'); tradeInExamples.classList.add('hidden');
    });
    tradeInTab.addEventListener('click', () => {
        tradeInTab.classList.add('active'); creditTab.classList.remove('active');
        tradeInCalculator.classList.remove('hidden'); creditCalculator.classList.add('hidden');
        tradeInBenefits.classList.remove('hidden'); creditBenefits.classList.add('hidden');
        tradeInExamples.classList.remove('hidden'); creditExamples.classList.add('hidden');
    });

    function formatNumber(num) { return num.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ' ') + ' ₽'; }

    const calcEntityType = document.getElementById('calcEntityType');
    const creditAmount = document.getElementById('creditAmount');
    const creditTerm = document.getElementById('creditTerm');
    const creditAmountValue = document.getElementById('creditAmountValue');
    const creditTermValue = document.getElementById('creditTermValue');
    const creditMonthly = document.getElementById('creditMonthly');

    function calculateCredit() {
        const amount = parseInt(creditAmount.value);
        const term = parseInt(creditTerm.value);
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
    calculateCredit();

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
<?php /**PATH /Users/lianavaleeva/Herd/autoblog/resources/views/credit-trade-in.blade.php ENDPATH**/ ?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>AI-ассистент — AvtoBlog</title>

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

        .page-head{ padding-top:8.5rem; padding-bottom:2.5rem; }
        @media (max-width:768px){ .page-head{ padding-top:7rem; padding-bottom:1.5rem; } }

        /* ---------- сам виджет чата ---------- */
        .chat-shell{
            background:var(--sand); color:var(--ink);
            box-shadow:0 40px 80px -30px rgba(0,0,0,.5), 0 0 0 1px rgba(196,144,124,.15);
            display:flex; flex-direction:column; overflow:hidden;
        }
        .chat-bar{
            background:var(--ink); color:var(--sand);
            padding:1.4rem 1.6rem; display:flex; align-items:center; gap:14px;
            border-bottom:1px solid rgba(196,144,124,.2);
        }
        .bot-avatar{
            width:46px; height:46px; border-radius:50%; background:var(--clay); flex-shrink:0;
            display:flex; align-items:center; justify-content:center; position:relative;
        }
        .status-dot{ position:absolute; bottom:-1px; right:-1px; width:13px; height:13px; border-radius:50%; background:var(--sage); border:2.5px solid var(--ink); }
        .status-dot::after{
            content:''; position:absolute; inset:0; border-radius:50%; background:var(--sage);
            animation:pulse-dot 1.8s cubic-bezier(0,0,.2,1) infinite;
        }
        @keyframes pulse-dot{ 0%{ transform:scale(1); opacity:.7 } 75%,100%{ transform:scale(2.2); opacity:0 } }

        .chat-body{
            height:52vh; min-height:420px; max-height:620px; overflow-y:auto;
            padding:1.75rem; background:var(--mist);
            scrollbar-width:thin; scrollbar-color:rgba(61,64,71,.2) transparent;
        }
        .chat-body::-webkit-scrollbar{ width:6px; }
        .chat-body::-webkit-scrollbar-thumb{ background:rgba(61,64,71,.18); border-radius:99px; }

        .msg{ display:flex; align-items:flex-start; gap:12px; animation:msgIn .4s var(--ease); margin-bottom:1.1rem; }
        .msg.user{ flex-direction:row-reverse; }
        @keyframes msgIn{ from{ opacity:0; transform:translateY(10px) } to{ opacity:1; transform:none } }

        .msg-avatar{ width:34px; height:34px; border-radius:50%; flex-shrink:0; display:flex; align-items:center; justify-content:center; }
        .msg-avatar.bot{ background:var(--ink); }
        .msg-avatar.user{ background:var(--clay); }

        .bubble{ max-width:78%; padding:.85rem 1.1rem; font-size:14.5px; line-height:1.55; }
        .bubble.bot{ background:var(--sand); color:var(--ink); border-radius:4px 16px 16px 16px; box-shadow:0 4px 14px -6px rgba(61,64,71,.18); }
        .bubble.user{ background:var(--clay); color:var(--ink); border-radius:16px 4px 16px 16px; }
        .bubble .stamp{ font-size:10.5px; margin-top:6px; opacity:.55; letter-spacing:.02em; }

        .chip{
            border:1px solid rgba(61,64,71,.18); background:var(--sand); color:var(--ink);
            padding:.55rem 1.1rem; font-size:13px; font-weight:600; border-radius:99px;
            transition:background .35s var(--ease), color .35s var(--ease), border-color .35s var(--ease), transform .3s var(--ease);
        }
        .chip:hover{ background:var(--clay); border-color:var(--clay); transform:translateY(-2px); }

        .typing-dots{ display:inline-flex; gap:4px; padding:.3rem 0; }
        .typing-dots span{ width:6px; height:6px; border-radius:50%; background:var(--clay); animation:td-bounce 1.3s infinite ease-in-out; }
        .typing-dots span:nth-child(2){ animation-delay:.15s; }
        .typing-dots span:nth-child(3){ animation-delay:.3s; }
        @keyframes td-bounce{ 0%,60%,100%{ transform:scale(1); opacity:.4 } 30%{ transform:scale(1.5); opacity:1 } }

        .chat-input-bar{ background:var(--sand); border-top:1px solid rgba(61,64,71,.1); padding:1.1rem 1.4rem; }
        .chat-input{
            flex:1; background:var(--mist); border:1px solid transparent; border-radius:99px;
            padding:.85rem 1.4rem; font-size:14.5px; color:var(--ink); transition:border-color .35s var(--ease), background .35s var(--ease);
        }
        .chat-input::placeholder{ color:var(--muted); }
        .chat-input:focus{ outline:none; border-color:var(--clay); background:var(--sand); }
        .send-btn{
            width:46px; height:46px; border-radius:50%; background:var(--clay); color:var(--ink); flex-shrink:0;
            display:flex; align-items:center; justify-content:center;
            box-shadow:0 8px 20px -8px rgba(196,144,124,.7);
            transition:background .35s var(--ease), transform .3s var(--ease);
        }
        .send-btn:hover{ background:var(--clay-dark); transform:scale(1.08) rotate(8deg); }
        .send-btn:active{ transform:scale(.96); }

        .hair-grid{ display:grid; gap:1px; background:rgba(196,144,124,.22); }
        .hair-grid > *{ background:var(--ink); }

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
                <a href="/chatbot" class="nav-link active text-[11px] uppercase tracking-label font-semibold text-sand transition-colors duration-500">Чат-бот</a>
                <a href="/reviews" class="nav-link text-[11px] uppercase tracking-label font-semibold text-sand/65 hover:text-sand transition-colors duration-500">Отзывы</a>
            </nav>

            <div class="flex items-center gap-7">
                <a href="tel:88001234567" class="hidden md:block font-display font-semibold text-[17px] hover:text-clay transition-colors duration-500">8-800-123-45-67</a>
                <a href="#chat" class="btn hidden lg:inline-flex items-center border border-sand/30 text-sand hover:text-ink px-7 py-3 text-[11px] uppercase tracking-label font-semibold relative overflow-hidden isolate">
                    Написать боту
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
            <a href="/chatbot" class="block text-[11px] uppercase tracking-label font-semibold text-clay">Чат-бот</a>
            <a href="/reviews" class="block text-[11px] uppercase tracking-label font-semibold text-sand/65">Отзывы</a>
        </div>
    </div>
</header>

<!-- ============================== ШАПКА СТРАНИЦЫ ============================== -->
<section class="page-head">
    <div class="max-w-[1400px] mx-auto px-6 lg:px-12 text-center">
        <p class="rise text-[10px] uppercase tracking-eyebrow font-semibold text-clay mb-6">AI-ассистент</p>
        <h1 class="rise font-display font-extrabold leading-[1.05] tracking-tight text-[clamp(2rem,4.2vw,3.2rem)]" style="--d:100ms">
            Спросите нас <span class="text-clay">прямо сейчас</span>
        </h1>
        <p class="rise max-w-xl mx-auto text-sand/60 text-[16px] leading-relaxed mt-6" style="--d:220ms">
            Отвечаем мгновенно на вопросы о выкупе, кредите и Trade-In — без ожидания менеджера.
        </p>
    </div>
</section>

<!-- ============================== ЧАТ ============================== -->
<section id="chat" class="pb-20 lg:pb-28">
    <div class="max-w-3xl mx-auto px-6 lg:px-12">
        <div class="rise chat-shell rounded-2xl" style="--d:280ms">

            <div class="chat-bar">
                <div class="bot-avatar">
                    <svg class="w-6 h-6 text-ink" fill="none" stroke="currentColor" stroke-width="1.6" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                    </svg>
                    <span class="status-dot"></span>
                </div>
                <div>
                    <h2 class="font-display font-bold text-[17px] leading-none">AI-ассистент AvtoBlog</h2>
                    <p class="text-[12px] text-sand/50 mt-1.5">В сети · отвечает мгновенно</p>
                </div>
            </div>

            <div id="chatMessages" class="chat-body">
                <div class="msg">
                    <div class="msg-avatar bot">
                        <svg class="w-4 h-4 text-sand" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                    </div>
                    <div class="bubble bot">
                        <p>Привет! Я AI-ассистент AvtoBlog. Могу помочь в выборе автомобиля!</p>
                        <p class="stamp">Только что</p>
                    </div>
                </div>

                <!-- <div class="msg">
                    <div class="msg-avatar bot">
                        <svg class="w-4 h-4 text-sand" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                    </div>
                    <div class="bubble bot">
                        <p class="mb-3">Выберите тему или напишите свой вопрос:</p>
                        <div class="flex flex-wrap gap-2">
                            <button onclick="sendQuickMessage('Как продать авто?')" class="chip">Продать авто</button>
                            <button onclick="sendQuickMessage('Расскажите о Trade-In')" class="chip">Trade-In</button>
                            <button onclick="sendQuickMessage('Как оформить кредит?')" class="chip">Кредит</button>
                            <button onclick="sendQuickMessage('Контакты')" class="chip">Контакты</button>
                        </div>
                    </div>
                </div> -->
            </div>

            <div class="chat-input-bar">
                <form id="chatForm" class="flex items-center gap-3">
                    <input type="text" id="messageInput" class="chat-input" placeholder="Напишите сообщение…" autocomplete="off">
                    <button type="submit" class="send-btn" aria-label="Отправить">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14m-6-6 6 6-6 6"/>
                        </svg>
                    </button>
                </form>
            </div>
        </div>

        <!-- мини-подсказки под виджетом -->
        <div class="rise hair-grid md:grid-cols-3 mt-10" style="--d:360ms">
            <div class="p-6 text-center">
                <svg class="w-5 h-5 text-clay mx-auto mb-3" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 2m6-2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                <p class="text-[13px] text-sand/55">Ответ за секунды, без ожидания в очереди</p>
            </div>
            <div class="p-6 text-center">
                <svg class="w-5 h-5 text-clay mx-auto mb-3" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 13l2-6a3 3 0 012.8-2h8.4a3 3 0 012.8 2l2 6M5 13h14a2 2 0 012 2v3H3v-3a2 2 0 012-2z"/></svg>
                <p class="text-[13px] text-sand/55">Знает всё о выкупе, кредите и Trade-In</p>
            </div>
            <div class="p-6 text-center">
                <svg class="w-5 h-5 text-clay mx-auto mb-3" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                <p class="text-[13px] text-sand/55">Не устроит бот — передаст живому менеджеру</p>
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
                        <path class="mark-body" d="M2 20v-2c0-1 .8-1.9 1.8-2l2.5-.3C7.6 12.9 11 10.6 15 10.6c3.6 0 6.8 1.9 8.5 4.8l2.7.6c1.4.3 2.4 1.5 2.4 2.9V20c0 .8-.7 1.5-1.5 1.5h-1.9a3.2 3.2 0 0 1-6.3 0H11.1a3.2 3.2 0 0 1-6.3 0H3.5C2.7 21.5 2 20.8 2 20Z" fill="#C4907C"/>
                        <circle class="mark-wheel" cx="8" cy="21.2" r="2.6" fill="#B07D6A"/>
                        <circle class="mark-wheel" cx="22" cy="21.2" r="2.6" fill="#B07D6A"/>
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
            <p class="text-[10px] uppercase tracking-label text-sand/25">© {{ date('Y') }} AvtoBlog</p>
        </div>
    </div>
</footer>

<!-- ============================== JAVASCRIPT ============================== -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    // 0. Непрозрачная шапка при скролле
    const header = document.getElementById('siteHeader');
    const onScroll = () => header.classList.toggle('solid', window.scrollY > 40);
    window.addEventListener('scroll', onScroll, { passive: true });
    onScroll();

    // 1. Мобильное меню
    const menuBtn = document.getElementById('menuBtn');
    const mobileMenu = document.getElementById('mobileMenu');
    if (menuBtn && mobileMenu) {
        menuBtn.addEventListener('click', () => {
            mobileMenu.classList.toggle('open');
            menuBtn.classList.toggle('active');
            header.classList.toggle('solid', mobileMenu.classList.contains('open') || window.scrollY > 40);
        });
        mobileMenu.querySelectorAll('a').forEach(a => a.addEventListener('click', () => {
            mobileMenu.classList.remove('open');
            menuBtn.classList.remove('active');
            header.classList.toggle('solid', window.scrollY > 40);
        }));
    }

    // 2. Элементы чата
    const chatMessages = document.getElementById('chatMessages');
    const chatForm = document.getElementById('chatForm');
    const messageInput = document.getElementById('messageInput');

    // Иконка бота для переиспользования
    const botIcon = `<svg class="w-4 h-4 text-sand" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>`;

    // 3. Функция добавления сообщения
    function addMessage(text, isUser = false) {
        const messageDiv = document.createElement('div');
        messageDiv.className = 'msg' + (isUser ? ' user' : '');

        const avatar = isUser
            ? `<div class="msg-avatar user"><span class="text-ink font-bold text-[13px]">Я</span></div>`
            : `<div class="msg-avatar bot">${botIcon}</div>`;

        // Форматируем текст: переносы строк и жирный шрифт
        let formattedText = text.replace(/\n/g, '<br>').replace(/\*\*(.*?)\*\*/g, '<strong>$1</strong>');

        messageDiv.innerHTML = `
            ${avatar}
            <div class="bubble ${isUser ? 'user' : 'bot'}">
                <p>${formattedText}</p>
                <p class="stamp">Только что</p>
            </div>
        `;
        
        chatMessages.appendChild(messageDiv);
        chatMessages.scrollTop = chatMessages.scrollHeight;
    }

    // 4. Индикатор печати
    function addTypingIndicator() {
        const typingDiv = document.createElement('div');
        typingDiv.className = 'msg';
        typingDiv.id = 'typingIndicator';
        typingDiv.innerHTML = `
            <div class="msg-avatar bot">${botIcon}</div>
            <div class="bubble bot">
                <div class="typing-dots"><span></span><span></span><span></span></div>
            </div>
        `;
        chatMessages.appendChild(typingDiv);
        chatMessages.scrollTop = chatMessages.scrollHeight;
    }

    function removeTypingIndicator() {
        const indicator = document.getElementById('typingIndicator');
        if (indicator) indicator.remove();
    }

    // 5. Быстрые сообщения (кнопки-чипсы)
    window.sendQuickMessage = function(text) {
        messageInput.value = text;
        chatForm.dispatchEvent(new Event('submit'));
    }

    // 6. ОТПРАВКА НА СЕРВЕР
    if (chatForm) {
        chatForm.addEventListener('submit', function(e) {
            e.preventDefault();
            const message = messageInput.value.trim();
            if (!message) return;

            // Добавляем сообщение пользователя
            addMessage(message, true);
            messageInput.value = '';
            
            // Показываем, что бот "печатает"
            addTypingIndicator();

            // Делаем запрос к Laravel контроллеру
            fetch('/chatbot/message', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    'Accept': 'application/json'
                },
                body: JSON.stringify({ message: message })
            })
            .then(response => {
                if (!response.ok) throw new Error('Network response was not ok');
                return response.json();
            })
            .then(data => {
                removeTypingIndicator();
                // Добавляем умный ответ от сервера
                addMessage(data.text, false);
            })
            .catch(error => {
                removeTypingIndicator();
                console.error('Ошибка чата:', error);
                addMessage("Упс, произошла ошибка соединения. Попробуйте еще раз!", false);
            });
        });
    }
});
</script>
<script>
// Принудительно показываем все элементы с классом rise
document.addEventListener('DOMContentLoaded', function() {
    setTimeout(() => {
        document.querySelectorAll('.rise').forEach(el => {
            el.classList.add('in');
        });
        console.log('✅ Элементы .rise принудительно показаны');
    }, 100);
});
</script>
</body>
</html>
<!-- Плавающий виджет чат-бота -->
<a href="/chatbot" class="fixed bottom-6 right-6 z-50 flex flex-col items-end group">
    
    <!-- Облачко с сообщением -->
    <!-- Появляется через 2 секунды после загрузки страницы и остаётся видимым -->
    <div class="mb-3 px-4 py-2.5 bg-white text-[#3D4047] text-sm font-semibold rounded-2xl rounded-br-none shadow-lg border border-[#C4907C]/20 opacity-0 translate-y-2 animate-[fadeInUp_0.5s_ease-out_2s_forwards] group-hover:scale-105 transition-transform duration-300">
        Чем могу помочь? 💬
    </div>

    <!-- Круглая кнопка -->
    <div class="relative w-16 h-16 bg-[#C4907C] hover:bg-[#B07D6A] text-white rounded-full shadow-xl flex items-center justify-center transition-all duration-300 hover:scale-110 cursor-pointer">
        <!-- Эффект пульсации (привлекает внимание) -->
        <span class="absolute inline-flex h-full w-full rounded-full bg-[#C4907C] opacity-30 animate-ping"></span>
        
        <!-- Иконка чата -->
        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 relative z-10" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
        </svg>
    </div>
</a>

<!-- Стили для анимации появления облачка -->
<style>
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(10px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
</style>
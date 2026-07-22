<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('ai_cars', function (Blueprint $table) {
            $table->id();
            
            // Базовая информация
            $table->string('brand'); // Марка (Toyota, BMW, etc.)
            $table->string('model'); // Модель (Camry, X5, etc.)
            $table->integer('year'); // Год выпуска
            $table->decimal('price', 12, 2); // Цена
            
            // Технические характеристики
            $table->string('body_type'); // Тип кузова (седан, внедорожник, etc.)
            $table->string('engine_type')->nullable(); // Тип двигателя (бензин, дизель, гибрид, электро)
            $table->string('engine_volume')->nullable(); // Объём двигателя (2.0, 3.5, etc.)
            $table->integer('horsepower')->nullable(); // Мощность в л.с.
            $table->string('transmission')->nullable(); // КПП (автомат, механика, робот)
            $table->string('drive_type')->nullable(); // Привод (передний, задний, полный)
            
            // Расход топлива
            $table->decimal('fuel_consumption', 4, 1)->nullable(); // Расход л/100км
            
            // Вместимость
            $table->integer('seats')->default(5); // Количество мест
            $table->integer('trunk_volume')->nullable(); // Объём багажника (литры)
            
            // Категории и особенности (для ИИ-фильтрации)
            $table->string('category')->nullable(); // Категория (семейный, спортивный, экономичный, премиум, внедорожник)
            $table->json('features')->nullable(); // Особенности (JSON: ["безопасный", "экономичный", "динамичный"])
            
            // Описание для ИИ (текстовое поле с ключевыми словами)
            $table->text('ai_description')->nullable(); // Описание для ИИ (например: "Идеальный семейный автомобиль с большим багажником и низким расходом топлива")
            
            // Изображение
            $table->string('image')->nullable(); // Фото машины
            
            // Статус
            $table->boolean('is_available')->default(true); // Доступна для продажи
            $table->boolean('is_recommended')->default(false); // Рекомендовать в первую очередь
            
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ai_cars');
    }
};
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
  public function up(): void
{
    Schema::create('cars', function (Blueprint $table) {
        $table->id();
        $table->string('brand'); // Марка
        $table->string('model'); // Модель
        $table->integer('year')->nullable(); // Год (может быть пустым)
        $table->decimal('price', 12, 2)->nullable(); // Цена (до 999 млрд)
        $table->text('description')->nullable(); // Длинное описание
        $table->boolean('is_published')->default(false); // Опубликовано или нет
        $table->timestamps(); // Дата создания и обновления
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};

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
    Schema::create('reviews', function (Blueprint $table) {
        $table->id();
        $table->string('client_name');
        $table->string('car_model'); // Какую машину продали
        $table->text('text');
        $table->integer('profit_amount')->nullable(); // Та самая выгода выше рынка
        $table->string('video_url')->nullable(); // Для видеоотзывов из ТЗ
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};

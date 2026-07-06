<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('calculator_settings', function (Blueprint $table) {
            $table->id();
            $table->enum('type', ['credit', 'trade-in']);
            $table->decimal('min_amount', 12, 2)->default(0);
            $table->decimal('max_amount', 12, 2)->default(0);
            $table->integer('min_term')->default(0);
            $table->integer('max_term')->default(0);
            $table->decimal('rate', 5, 2)->default(0);
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('calculator_settings');
    }
};
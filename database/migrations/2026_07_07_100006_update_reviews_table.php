<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('reviews', function (Blueprint $table) {
            $table->string('client_photo')->nullable()->after('client_name');
            $table->integer('rating')->default(5)->after('text');
            $table->boolean('is_published')->default(true)->after('rating');
        });
    }

    public function down(): void
    {
        Schema::table('reviews', function (Blueprint $table) {
            $table->dropColumn(['client_photo', 'rating', 'is_published']);
        });
    }
};
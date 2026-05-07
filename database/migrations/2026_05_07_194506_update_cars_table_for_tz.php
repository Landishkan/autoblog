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
    Schema::table('cars', function (Blueprint $table) {
        $table->string('status')->default('available'); // available, sold, trade-in
        $table->decimal('old_price', 12, 2)->nullable(); // для фишки "выгода 50к"
        $table->boolean('is_featured')->default(false); // для вывода на главную в топ
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('cars', function (Blueprint $table) {
            //
        });
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * title: Promosyonun adı veya başlığı.
     * description: Promosyonun açıklaması (isteğe bağlı).
     * discount_amount: Promosyonun sağladığı indirim miktarı.
     * start_date: Promosyonun başlangıç tarihi.
     * end_date: Promosyonun bitiş tarihi.
     */
    public function up(): void
    {
        Schema::create('promotions', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description')->nullable();
            $table->enum('status', ['active', 'passive'])->default('active');
            $table->decimal('discount_amount', 10, 2)->default(0);
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('promotions');
    }
};

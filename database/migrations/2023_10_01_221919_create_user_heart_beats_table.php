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
        Schema::create('user_heart_beats', function (Blueprint $table) {
            $table->char('id',36);
            $table->string('user_id')->default('0');
            $table->text('activity')->nullable()->comment('heartbeat attributes');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_heart_beats');
    }
};

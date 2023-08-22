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
        Schema::create('sliders', function (Blueprint $table) {
                $table->id();
                $table->text('name')->nullable();
                $table->text('link')->nullable();
                $table->text('value')->nullable();
                $table->tinyInteger('status')->nullable();
                $table->tinyText('type')->nullable();
                $table->text('image')->nullable();
                $table->bigInteger('user_id')->nullable();
                $table->tinyInteger('category_id')->nullable();
                $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('port_folios');
    }
};

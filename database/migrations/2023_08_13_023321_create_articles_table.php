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
        Schema::create('articles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('category_id');
            $table->string('title');
            $table->string('slug')->nullable();
            $table->text('short_detail')->nullable();
            $table->longText('detail')->nullable();
            $table->string('keywords')->nullable();
            $table->tinyInteger('publish')->default(0);
            $table->tinyInteger('location')->nullable()->default(0);
            $table->integer('photogallery_id')->nullable();
            $table->integer('videogallery_id')->nullable();
            $table->string('meta_keywords')->nullable();
            $table->string('meta_description')->nullable();
            $table->bigInteger('user_id')->nullable();
            $table->string('image')->nullable();
            $table->tinyInteger('mtitle')->nullable();
            $table->integer('hit')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};

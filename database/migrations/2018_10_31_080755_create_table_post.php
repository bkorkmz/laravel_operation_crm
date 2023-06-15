<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablePost extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('category_id');
            $table->string('title');
            $table->string('slug');
            $table->text('short_detail')->nullable();
            $table->text('detail')->nullable();
            $table->string('keywords')->nullable();
            $table->integer('publish')->default(0);
            $table->integer('location')->default(0);
            $table->integer('photogallery_id')->nullable();
            $table->integer('videogallery_id')->nullable();
            $table->string('meta_keywords')->nullable();
            $table->string('meta_description')->nullable();
            $table->integer('user_id')->default(1);
            $table->string('image')->nullable();
            $table->string('image_main')->nullable();
            $table->string('image_top')->nullable();
            $table->string('image_mini')->nullable();
            $table->integer('mtitle')->nullable();
            $table->integer('source_id')->nullable();
            $table->integer('hit')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('post');
    }
}

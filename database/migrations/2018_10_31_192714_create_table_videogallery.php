<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableVideogallery extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('videogallery', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('category_id');
            $table->string('title');
            $table->string('slug');
            $table->text('detail')->nullable();
            $table->text('embed')->nullable();
            $table->text('video')->nullable();
            $table->string('keywords')->nullable();
            $table->integer('publish')->default(0);
            $table->string('image')->nullable();
            $table->integer('hit')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('videogallery');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->uuid('id');
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('detail');
            $table->integer('page_type')->nullable();
            $table->integer('parentpage')->nullable();
            $table->text('image')->nullable();
            $table->text('pdf')->nullable();
            $table->integer('publish');
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
        Schema::dropIfExists('page');
    }
};

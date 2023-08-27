<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('info_message', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('email')->nullable();
            $table->tinyText('subject')->nullable();
            $table->text('content')->nullable();
            $table->integer('publish')->default(0);
            $table->string('ip')->nullable();
            $table->string('location')->nullable();
            $table->string('resume_file')->nullable();
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
        Schema::dropIfExists('message');
    }
};

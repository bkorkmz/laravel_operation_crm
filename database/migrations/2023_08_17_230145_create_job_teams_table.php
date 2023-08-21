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
        Schema::create('job_teams', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('job');
            $table->tinyInteger('status');
            $table->tinyInteger('raiting')->nullable();
            $table->string('fb')->nullable();
            $table->string('tw')->nullable();
            $table->string('gp')->nullable();
            $table->string('in')->nullable();
            $table->string('yt')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('avatar')->nullable();
            $table->timestamps();
        });



    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_teams');
    }
};

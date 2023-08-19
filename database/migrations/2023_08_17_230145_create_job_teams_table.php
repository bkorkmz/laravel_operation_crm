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
            $table->bigInteger('user_id');
            $table->text('job');
            $table->tinyInteger('status');
            $table->tinyInteger('raiting')->nullable();
            $table->timestamps();


            // $table->foreign('user_id')
            // ->references('id')
            // ->on('users')
            // ->onDelete('cascade'); // onDelete işlemi
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

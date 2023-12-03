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
        Schema::create('module_landing_page_sections', function (Blueprint $table) {
            $table->id();
            $table->string('section_name');
            $table->tinyInteger('status')->default(0);
            $table->text('section_content')->nullable()->comment('page content json');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('module_landing_page_sections');
    }
};

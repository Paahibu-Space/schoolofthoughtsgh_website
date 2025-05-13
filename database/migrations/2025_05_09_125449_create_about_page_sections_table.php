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
        Schema::create('about_page_sections', function (Blueprint $table) {
            $table->id();
            $table->foreignId('page_setting_id')->constrained()->onDelete('cascade');
            $table->string('section_type'); // 'general', 'mission', 'vision'
            $table->text('content');
            $table->string('image')->nullable(); // For mission and vision sections
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('about_page_sections');
    }
};

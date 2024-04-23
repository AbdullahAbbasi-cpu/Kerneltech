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
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->string('page_template')->nullable();
            $table->string('title')->nullable();
            $table->string('slug')->nullable();
            $table->string('icon')->nullable();
            $table->tinyInteger('is_active')->nullable();
            $table->text('description')->nullable();
            $table->string('image_1')->nullable();
            $table->string('title_1')->nullable();
            $table->string('description_1')->nullable();
            $table->string('image_2')->nullable();
            $table->string('title_2')->nullable();
            $table->string('description_2')->nullable();
            $table->string('image_3')->nullable();
            $table->string('title_3')->nullable();
            $table->string('description_3')->nullable();
            $table->string('image_4')->nullable();
            $table->string('title_4')->nullable();
            $table->string('description_4')->nullable();
            $table->string('working_process_to_show')->nullable();
            $table->json('industries_to_show')->nullable();
            $table->json('technologies_to_show')->nullable();
            $table->json('st_testimonials_to_show')->nullable();
            $table->json('ht_testimonials_to_show')->nullable();
            $table->json('achievements_to_show')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pages');
    }
};

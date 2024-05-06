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
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->string('featured_image')->nullable(true);
            $table->string('author_name');
            $table->string('author_picture');
            $table->string('author_description');
            $table->tinyInteger('is_active')->default(0);
            $table->string('description');
            $table->string('category');
            $table->string('title');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blogs');
    }
};

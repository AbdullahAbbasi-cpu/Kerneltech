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
        Schema::create('media', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('media_type')->comment('1: Photo, 2: Shorts, 3: Videos');
            $table->string('image')->nullable();
            $table->string('embedded_code', 400)->nullable();
            $table->string('thumbnail')->nullable();
            $table->text('description')->nullable();
            $table->integer('position')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('media');
    }
};

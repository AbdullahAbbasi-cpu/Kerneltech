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
        Schema::create('site_settings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('site_title')->nullable();
            $table->string('contact_email')->nullable();
            $table->string('pakistan_contact_number')->nullable();
            $table->string('pakistan_address')->nullable();
            $table->string('london_contact_number')->nullable();
            $table->string('london_address')->nullable();
            $table->string('main_logo')->nullable();
            $table->string('sticky_logo')->nullable();
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('copyright')->nullable();
            $table->string('footer_script')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('google')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('site_settings');
    }
};

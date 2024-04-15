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
        Schema::table('site_settings', function (Blueprint $table) {
            $table->tinyInteger('show_privacy_policy')->after('london_address')->default(0);
            $table->tinyInteger('show_terms_and_condition')->after('show_privacy_policy')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('site_settings', function (Blueprint $table) {
            $table->dropColumn('show_privacy_policy');
            $table->dropColumn('show_terms_and_condition');
        });
    }
};

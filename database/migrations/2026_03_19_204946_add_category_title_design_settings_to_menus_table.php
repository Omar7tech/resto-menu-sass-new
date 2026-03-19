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
        Schema::table('menus', function (Blueprint $table) {
            $table->boolean('is_category_title_bold')->default(true);
            $table->boolean('is_category_title_centered')->default(false);
            $table->boolean('is_category_title_custom_font')->default(true);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('menus', function (Blueprint $table) {
            $table->dropColumn(['is_category_title_bold', 'is_category_title_centered', 'is_category_title_custom_font']);
        });
    }
};

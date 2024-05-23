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
        Schema::create('menus', function (Blueprint $table) {
            $table->id();
            $table->string('title_kz',255);
            $table->string('title_ru',255);
            $table->foreignId('parent_id')->nullable()->constrained('menus');
            $table->string('link',255)->nullable();
            $table->tinyInteger('sort')->default(0);
            $table->foreignId('category_id')->constrained('menu_categories');
            $table->boolean('active')->default(true);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menus');
    }
};

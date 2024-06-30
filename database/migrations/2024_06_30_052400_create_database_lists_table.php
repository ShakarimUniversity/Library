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
        Schema::create('database_lists', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description_kz');
            $table->text('description_ru');
            $table->text('description_en')->nullable();
            $table->string('initial',2);
            $table->string('link');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('database_lists');
    }
};

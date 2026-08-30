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
        Schema::create('abouts', function (Blueprint $table) {
            $table->id();

            // Hero Section
            $table->string('sub_title');
            $table->string('slug')->unique();
            $table->string('hero_heading');
            $table->text('short_description');

            // About, Mission and Vision Section
            // $table->string('icon');
            // $table->string('title');
            // $table->string('slug')->unique();
            // $table->longText('description')->nullable();

            // // What Our System Provides Section
            // $table->string('small_icon');
            // $table->string('heading');
            // $table->text('small_description');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('abouts');
    }
};

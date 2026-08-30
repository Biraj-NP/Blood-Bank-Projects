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
        Schema::create('bloodcampaigns', function (Blueprint $table) {
         $table->id();
         $table->string('title');
         $table->string('slug')->unique();
         $table->string('duration');
         $table->string('image');
         $table->string('duration_time');
         $table->string('day_time');
         $table->longText('description');
         $table->string('phone_no');
         $table->string('venue');
         $table->string('location');
         $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bloodcampaigns');
    }
};

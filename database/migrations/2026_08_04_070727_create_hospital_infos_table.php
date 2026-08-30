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
        Schema::create('hospital_infos', function (Blueprint $table) {
            $table->id();
            $table->string('image');
            $table->string('hospital_name');
            $table->longText('description');
            $table->string('hospital_phone');
            $table->string('email');
            $table->text('address');
            $table->string('messenger')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hospital_infos');
    }
};

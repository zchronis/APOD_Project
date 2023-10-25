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
        Schema::create('apods', function (Blueprint $table) {
            $table->id('apod_id');
            $table->text('copyright');
            $table->date('photo_date');
            $table->text('explanation');
            $table->text('hdurl');
            $table->text('title');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('apods');
    }
};

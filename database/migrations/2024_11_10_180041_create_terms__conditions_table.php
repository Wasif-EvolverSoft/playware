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
        Schema::create('terms__conditions', function (Blueprint $table) {
            $table->id();
            $table->string('heading')->nullable();
            $table->text('question')->nullable();
            $table->text('answer')->nullable();
            $table->integer('order')->default(0); // For ordering accordions
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('terms__conditions');
    }
};

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
        Schema::create('contents', function (Blueprint $table) {
            $table->id();
            $table->string('contentId')->unique();
            $table->string('image');
            $table->string('featureText')->nullable();
            $table->string('mainHeading');
            $table->string('Highlight_Text')->nullable();
            $table->string('Price_Text')->nullable();
            $table->string('Amount_Percentage')->nullable();
            $table->string('ButtonText');
            $table->string('ButtonLink');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contents');
    }
};

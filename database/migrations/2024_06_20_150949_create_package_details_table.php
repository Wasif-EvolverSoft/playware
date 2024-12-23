<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('package_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('title');
            $table->string('quantity');
            $table->text('description');
            $table->float('originalPrice', 10, 2);
            $table->float('SellPrice', 10, 2)->nullable();
            $table->string('mainImage');
            $table->string('firstImage');
            $table->string('secondImage');
            $table->string('thirdImage');
            $table->string('fourthImage')->nullable();
            $table->string('fifthImage')->nullable();
            $table->boolean('approved')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('package_details');
    }
};

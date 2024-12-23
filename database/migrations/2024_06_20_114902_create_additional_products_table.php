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
        Schema::create('additional_products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('productId');
            $table->foreign('productId')->references('id')->on('products')->onDelete('cascade');
            $table->string('name');
            $table->unsignedBigInteger('brandId');
            $table->foreign('brandId')->references('id')->on('brands');
            $table->unsignedBigInteger('CategoryID');
            $table->foreign('CategoryID')->references('id')->on('categories')->onDelete('cascade');
            $table->string('UsedOrNew');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('additional_products');
    }
};

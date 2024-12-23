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
        Schema::create('package_products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('packageID');
            $table->foreign('packageID')->references('id')->on('package_details')->onDelete('cascade');
            $table->string('title');
            $table->unsignedBigInteger('CategoryID');
            $table->foreign('CategoryID')->references('id')->on('categories')->onDelete('cascade');
            $table->unsignedBigInteger('BrandID');
            $table->foreign('BrandID')->references('id')->on('brands')->onDelete('cascade');
            $table->string('usedOrNew');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('package_products');
    }
};

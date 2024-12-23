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
        Schema::create('product_variations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('productId');
            $table->foreign('productId')->references('id')->on('products')->onDelete('cascade');
            $table->string('ProcessorName');
            $table->string('ProcessorBrand');
            $table->string('ProcessorUsedOrNew')->nullable();
            $table->string('GraphicCardName');
            $table->string('GraphicCardBrand');
            $table->string('GraphicCardMemory');
            $table->string('GraphicCardUsedOrNew')->nullable();
            $table->string('MotherBoardName')->nullable();
            $table->string('MotherBoardBrand')->nullable();
            $table->string('MotherBoardUsedOrNew')->nullable();
            $table->string('RamName');
            $table->string('RamBrand');
            $table->string('RamMemory');
            $table->string('RamUsedOrNew')->nullable();
            $table->string('RamQuantity');
            $table->string('PSUName')->nullable();
            $table->string('PSUBrand')->nullable();
            $table->string('PSUWatts')->nullable();
            $table->string('PSUUsedOrNew')->nullable();
            $table->string('CaseName')->nullable();
            $table->string('CaseBrand')->nullable();
            $table->string('CaseUsedOrNew')->nullable();
            $table->string('CoolerName')->nullable();
            $table->string('CoolerBrand')->nullable();
            $table->string('CoolerUsedOrNew')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_variations');
    }
};

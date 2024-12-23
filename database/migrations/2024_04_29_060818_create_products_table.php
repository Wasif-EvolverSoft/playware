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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->integer('ProductType');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('productTitle');
            $table->string('slug')->unique();
            $table->unsignedBigInteger('brandName');
            $table->foreign('brandName')->references('id')->on('brands')->onDelete('cascade');
            $table->unsignedBigInteger('productCategory');
            $table->foreign('productCategory')->references('id')->on('categories')->onDelete('cascade');
            $table->string('AboutThisitem')->nullable();
            $table->integer('productQuantity');
            $table->string('yearOfProduct');
            $table->string('warranty');
            $table->string('reason')->nullable();
            $table->integer('repaired')->default(0);
            $table->text('explainAboutRepairing')->nullable();
            $table->text('productDescription');
            $table->float('originalPrice', 10,2)->nullable();
            $table->float('SellPrice', 10,2)->nullable();
            $table->string('mainImage');
            $table->string('firstImage');
            $table->string('secondImage');
            $table->string('thirdImage');
            $table->string('fourthImage')->nullable();
            $table->string('fifthImage')->nullable();
            $table->integer('approved');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};

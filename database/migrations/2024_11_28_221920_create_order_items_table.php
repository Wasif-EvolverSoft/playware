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
        Schema::create('order_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('order_id'); // Link to the orders table
            $table->unsignedBigInteger('product_id'); // Product ID from the cart
            $table->string('product_name')->nullable();
            $table->integer('quantity')->nullable();
            $table->float('price', 10, 2); // Product price
            $table->float('total', 10, 2); // Total price (quantity * price)
            $table->timestamps();
            // Foreign Key Constraints
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_items');
    }
};

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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('parent_order_id')->unique();
            $table->unsignedBigInteger('customer_id');
            $table->string('full_name');
            $table->string('email');
            $table->string('phone_number');
            $table->string('shipping_address');
            $table->string('billing_address');
            $table->decimal('total_amount', 10, 2)->default(0.00);
            $table->string('paymentCheck')->default('Not Paid');
            $table->string('paymentType')->nullable(); // payment method like 'bank_transfer'
            $table->json('order_items'); // JSON to store order items directly in the order
            $table->json('payment_details')->nullable(); // Store payment info as JSON
            $table->string('status')->default('pending');
            $table->timestamps();

            // Foreign key for the customer (user)
            $table->foreign('customer_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};

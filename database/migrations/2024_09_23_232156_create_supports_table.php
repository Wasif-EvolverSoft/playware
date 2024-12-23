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
        Schema::create('supports', function (Blueprint $table) {
            $table->id();
            $table->string('ticket_number')->unqiue();
            $table->enum('ticket_type', ['General Enquiry', 'Order Enquiry']);
            $table->enum('status', ['Active', 'Closed'])->default('Active');
            $table->foreignId('customer_id')->references('id')->on('users');
            $table->string('vendor_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('supports');
    }
};

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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('fullName');
            $table->string('fatherName');
            $table->string('Email')->unique();
            $table->string('number')->unique();
            $table->string('address');
            $table->string('dob');
            $table->string('ShopAddress')->nullable();
            $table->string('ShopName')->nullable();
            $table->string('ShopPicture')->nullable();
            $table->string('ShopBusinessCardPicture')->nullable();
            $table->string('CNIC')->unique()->nullable();
            $table->string('CNICFrontPicture')->nullable();
            $table->string('CNICBackPicture')->nullable();
            $table->string('selfie')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->integer('approved')->default(0);
            $table->string('accountType')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};

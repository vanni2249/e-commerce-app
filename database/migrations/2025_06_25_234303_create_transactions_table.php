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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->string('number')->unique(); // Unique identifier for the transaction
            $table->foreignId('user_id');
            $table->foreignId('cart_id')->nullable(); // Optional, if you want to link to a cart
            $table->decimal('amount', 10, 2);
            $table->string('status'); // e.g., 'success', 'failed'
            $table->string('payment_method'); // e.g., 'stripe', 'paypal'
            $table->string('transaction_id')->unique(); // Unique ID from the payment gateway
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};

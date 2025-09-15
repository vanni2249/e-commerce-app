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
        Schema::create('inventories', function (Blueprint $table) {
            $table->id();
            $table->enum('type', ['purchase', 'return', 'adjustment'])->default('purchase');
            $table->foreignId('product_id');
            $table->string('number')->unique();
            $table->integer('initial_quantity')->default(0);
            $table->integer('quantity')->default(0);
            $table->decimal('price', 10, 2)->default(0.00);
            $table->foreignId('created_seller_id')->nullable();
            $table->foreignId('create_admin_id')->nullable();
            $table->enum('status', ['pending', 'received', 'canceled'])->default('pending');
            $table->timestamp('received_at')->nullable();
            $table->foreignId('received_by')->nullable();
            $table->string('comment')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventories');
    }
};

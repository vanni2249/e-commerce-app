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
        Schema::create('items', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->enum('type', ['fbz', 'fbs'])->default('fbz');
            $table->string('number')->unique();
            $table->string('sku')->unique()->nullable();
            $table->boolean('is_to_customer')->default(true);
            $table->boolean('is_to_business')->default(false);
            $table->foreignId('seller_id')->nullable();
            $table->foreignId('section_id');
            $table->json('title')->nullable();
            $table->json('description')->nullable();
            $table->json('shipping_policy')->nullable();
            $table->json('return_policy')->nullable();
            $table->foreignId('approved_by')->nullable();
            $table->timestamp('approved_at')->nullable();
            $table->timestamp('available_at')->nullable();
            $table->boolean('is_active')->default(false);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};

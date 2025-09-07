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
            $table->string('number')->unique();
            $table->string('sku')->unique()->nullable();
            $table->foreignId('seller_id')->nullable();
            $table->foreignId('section_id');
            $table->longText('en_title')->nullable();
            $table->longText('es_title')->nullable();
            $table->longText('en_short_description')->nullable();
            $table->longText('es_short_description')->nullable();
            $table->longText('en_description')->nullable();
            $table->longText('es_description')->nullable();
            $table->json('en_specifications')->nullable();
            $table->json('es_specifications')->nullable();
            $table->longText('en_shipping_policy')->nullable();
            $table->longText('es_shipping_policy')->nullable();
            $table->longText('en_return_policy')->nullable();
            $table->longText('es_return_policy')->nullable();
            $table->foreignId('approved_by')->nullable();
            $table->timestamp('approved_at')->nullable();
            $table->timestamp('available_at')->nullable();
            $table->softDeletes();
            $table->boolean('is_active')->default(false);
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

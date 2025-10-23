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
        Schema::create('seller_shop', function (Blueprint $table) {
            $table->id();
            $table->foreignId('seller_id')->nullable()->constrained()->onDelete('set null');
            $table->foreignId('shop_id')->nullable()->constrained()->onDelete('set null');
            $table->boolean('is_active')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('seller_shop');
    }
};

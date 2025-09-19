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
        Schema::create('item_wishlist', function (Blueprint $table) {
            $table->id();
            $table->foreignUlid('item_id')->constrained()->onDelete('cascade');
            $table->foreignId('wishlist_id')->constrained('wishlists')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('item_wishlist');
    }
};

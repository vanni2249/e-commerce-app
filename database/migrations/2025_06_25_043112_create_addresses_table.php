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
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();
            $table->enum('type', ['postal', 'residencial', 'business'])->default('residencial');
            $table->string('name')->nullable();
            $table->string('line1');
            $table->string('line2')->nullable();
            $table->foreignId('city_id')->nullable()->constrained('cities')->onDelete('set null');
            $table->string('state_code')->nullable();
            $table->string('postal_code')->nullable();
            $table->boolean('is_default')->default(false);
            $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('set null');
            $table->string('phone')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('addresses');
    }
};

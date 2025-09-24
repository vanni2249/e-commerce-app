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
        Schema::create('claims', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->string('number')->unique();
            // $table->morphs('claimable');
            $table->char('claimable_id', 26); // ULID is 26 characters
            $table->string('claimable_type');
            $table->foreignId('claim_category_id')->nullable()->constrained()->onDelete('set null');
            $table->text('comments')->nullable();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('claims');
    }
};

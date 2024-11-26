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
        Schema::create('user_follows', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');  // Add the user_id column
            $table->morphs('followable');  // This will create followable_id and followable_type
            $table->boolean('favorite')->default(false);  // Favorite status
            $table->timestamps();
            $table->unique(['user_id', 'followable_id', 'followable_type']);  // Unique constraint to prevent duplicate follows
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_follows');
    }
};

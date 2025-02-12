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
        Schema::create('sequels_prequels', function (Blueprint $table) {
            $table->id();
            $table->foreignId('game_id_prequel')->constrained('games')->onDelete('cascade');
            $table->foreignId('game_id_sequel')->constrained('games')->onDelete('cascade');
            $table->timestamps();

            $table->unique(['game_id_prequel', 'game_id_sequel']); // Prevents duplicate relationships
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sequels_prequels');
    }
};

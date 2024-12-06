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
        Schema::create('user_game_lists', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('game_id')->constrained('games');
//            $table->boolean('favorite')->default(false);
            $table->enum('status',['plan to play', 'completed' , 'dropped' , 'paused', 'replaying', 'playing'])->default('playing');
            $table->integer('score')->default(0);
            $table->date('start_date')->nullable();
            $table->date('finish_date')->nullable();
            $table->integer('total_replay')->default(0);
            $table->text('note')->nullable(); // to write a large notes
            $table->timestamps();
            $table->unique(['user_id', 'game_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_game_lists');
    }
};

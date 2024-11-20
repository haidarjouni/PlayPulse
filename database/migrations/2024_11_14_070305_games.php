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
        Schema::create('game', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('profile_image')->nullable();  // Add this line for the profile image
            $table->text('description');
            $table->string("format")->default("Game");
            $table->integer("duration");
            $table->string("status");
            $table->date("dev_date");
            $table->date("release_date")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('game');
    }
};

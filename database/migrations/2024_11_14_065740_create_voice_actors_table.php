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
        Schema::create('voice_actors', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('age');
            $table->boolean('gender')->default(false); // Default as 'false' for Female or other
            $table->string('profile_image')->nullable();  // Add this line for the profile image
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('voice_actors');
    }
};

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
        Schema::create('character', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('profile_image')->nullable();  // Nullable profile image
            $table->integer('age')->nullable();  // Nullable age
            $table->boolean('gender')->default(true);  // Default to Male (if true is Male)
            $table->integer('height')->nullable();  // Nullable height
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('character');
    }
};

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
        Schema::dropIfExists('seasons');
        Schema::create('seasons', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('storyline_id')->constrained()->onDelete('cascade');
            $table->string('title');
            $table->integer('number');
            $table->unique(['storyline_id', 'number']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('seasons');
    }
};

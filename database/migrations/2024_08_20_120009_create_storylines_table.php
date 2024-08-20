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
        Schema::dropIfExists('storylines');
        Schema::create('storylines', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->boolean('type'); // 0 movie , 1 serie 
            $table->string('trailer');
            $table->date('release_date');
            $table->integer('rating')->default(0); // this has to be 0 to 10 we will apply it in the constraint 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('storylines');
    }
};

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
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string('name', 75);
            $table->string('ingredients', 255);
            $table->string('allergens', 100)->nullable();
            $table->string('image', 50);
            $table->float('price');
            $table->boolean('highlighted');
            $table->timestamps();

            $table->foreignId('gamme_id')->constrained();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};

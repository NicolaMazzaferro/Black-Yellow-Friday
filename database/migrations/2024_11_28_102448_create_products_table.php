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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Nome del prodotto
            $table->text('description'); // Descrizione
            $table->decimal('price', 8, 2); // Prezzo
            $table->string('image')->nullable(); // Percorso immagine
            $table->timestamps(); // Timestamps di default
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};

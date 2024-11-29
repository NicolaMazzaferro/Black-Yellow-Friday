<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id'); // Relazione con i prodotti
            $table->text('content'); // Contenuto della recensione
            $table->integer('rating'); // Valutazione (1-5)
            $table->timestamps();
    
            // Definizione della chiave esterna
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};

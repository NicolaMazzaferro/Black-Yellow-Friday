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
        Schema::table('products', function (Blueprint $table) {
            $table->foreignId('category_id') // Collega la categoria
                  ->nullable() // Può essere null inizialmente
                  ->constrained('categories') // Relazione con la tabella 'categories'
                  ->onDelete('set null'); // Se una categoria viene eliminata, imposta null
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropForeign(['category_id']); // Rimuove la relazione
            $table->dropColumn('category_id'); // Rimuove la colonna
        });
    }
};

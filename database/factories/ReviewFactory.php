<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Product;
use App\Models\User;

class ReviewFactory extends Factory
{
    protected $model = \App\Models\Review::class;

    public function definition()
    {
        return [
            'product_id' => Product::factory(), // Crea un prodotto associato
            'user_id' => User::factory(),       // Crea un utente associato
            'content' => $this->faker->paragraph, // Contenuto della recensione
            'rating' => $this->faker->numberBetween(1, 5), // Voto tra 1 e 5
        ];
    }
}

<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    protected $model = \App\Models\Product::class;

    public function definition()
    {
        return [
            'name' => $this->faker->word,
            'description' => $this->faker->paragraph,
            'price' => $this->faker->randomFloat(2, 10, 100),
            'image' => 'https://picsum.photos/id/' . $this->faker->numberBetween(1, 100) . '/200/300',
            'category_id' => Category::inRandomOrder()->first()->id,
            'discount' => $this->faker->boolean(50) ? $this->faker->randomFloat(2, 5, 50) : 0,
        ];
    }
}

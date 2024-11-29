<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Category::create(['name' => 'APPLE', 'description' => 'Dispositivi apple']);
        Category::create(['name' => 'INFORMATICA', 'description' => 'PC - Tablet - Mouse - Tastiere ecc...']);
        Category::create(['name' => 'TV', 'description' => 'Televisioni di ultima generazione']);
        Category::create(['name' => 'GAMING', 'description' => 'Dispositivi da gaming']);
        Category::create(['name' => 'ELETTRODOMESTICI', 'description' => 'Accessori per la casa']);
        Category::create(['name' => 'SMARTPHONE', 'description' => 'Gli ultimi modelli di smartphone']);
    }
}

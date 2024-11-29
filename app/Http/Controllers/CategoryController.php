<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    // Mostra tutte le categorie
    public function index()
    {
        $categories = Category::with('products')->get(); // Recupera le categorie con i prodotti associati
        return view('categories.index', compact('categories'));
    }

    // Mostra i prodotti di una specifica categoria
    public function show(Category $category)
    {
        $products = $category->products; // Recupera i prodotti della categoria
        return view('categories.show', compact('category', 'products'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Mostra tutti i prodotti.
     */
    public function index()
    {
        $products = Product::orderBy('created_at', 'desc')->paginate(9); // Mostra tutti i prodotti con paginazione dal piu recente
        return view('products.index', compact('products'));
    }

    /**
     * Mostra un prodotto specifico.
     */
    public function show($id)
    {
        $product = Product::findOrFail($id); // Trova il prodotto o genera un errore 404

        // Calcola la media delle recensioni del prodotto
        $averageRating = $product->reviews()->avg('rating');

        // Array per il breadcrumb
        $breadcrumbs = [
            ['label' => 'Home', 'url' => route('homepage')],
            ['label' => 'Categorie', 'url' => route('categories')],
        ];

        if ($product->category) {
            $breadcrumbs[] = [
                'label' => $product->category->name,
                'url' => route('categories.show', $product->category->id)
            ];
        }

        $breadcrumbs[] = [
            'label' => $product->name,
            'url' => null
        ];

        return view('products.show', compact('product', 'breadcrumbs', 'averageRating'));
    }
}

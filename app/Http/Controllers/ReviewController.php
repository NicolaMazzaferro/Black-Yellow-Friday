<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Product;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    /**
     * Aggiunge una recensione per un prodotto.
     */
    public function store(Request $request, $productId)
    {
        // Validazione del form
        $request->validate([
            'content' => 'required|string',
            'rating' => 'required|integer|min:1|max:5',
        ], [
            'content.required' => 'Il contenuto della recensione è obbligatorio.',
            'rating.required' => 'La valutazione è obbligatoria.',
            'rating.integer' => 'La valutazione deve essere un numero intero.',
            'rating.min' => 'La valutazione minima è 1.',
            'rating.max' => 'La valutazione massima è 5.',
        ]);
    
        // Trova il prodotto o genera un errore 404
        $product = Product::findOrFail($productId);
    
        // Crea la recensione
        Review::create([
            'product_id' => $product->id,
            'user_id' => auth()->id(),
            'content' => $request->content,
            'rating' => $request->rating,
        ]);
    
        return redirect()->back()->with('success', 'Recensione aggiunta con successo!');
    }    
}

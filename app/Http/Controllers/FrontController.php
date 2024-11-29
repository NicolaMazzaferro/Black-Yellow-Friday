<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Review;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FrontController extends Controller
{
    /**
     * Mostra tutti i prodotti.
     */
    public function index()
    {
        // Recupera gli ultimi 9 prodotti con uno sconto assegnato
        $productsWithDiscount = Product::where('discount', '>', 0)
            ->orderBy('created_at', 'desc')
            ->take(6)
            ->get();
    
        // Se non ci sono prodotti con uno sconto recupera gli ultimi 9 prodotti
        $products = $productsWithDiscount->isNotEmpty() ? $productsWithDiscount : Product::orderBy('created_at', 'desc')->take(9)->get();
    
        // Recupera le 3 recensioni con il voto più alto
        $topReviews = Review::orderBy('rating', 'desc')
            ->orderBy('created_at', 'desc')
            ->take(6)
            ->get();

        // Recupera tutte le categorie
        $categories = Category::all();
    
        // Passa i dati alla vista
        return view('homepage', compact('products', 'topReviews', 'categories'));
    }

    public function profile()
    {
        $user = Auth::user();
        $reviewsCount = $user->reviews()->count();
    
        return view('auth.profile', compact('user', 'reviewsCount'));
    }

    public function updateProfile()
    {
        $user = Auth::user();

        return view('auth.updateProfile', compact('user'));
    }

    public function search(Request $request)
    {
        $query = $request->input('query');

        // Cerca nei prodotti
        $products = Product::search($query)->get();
    
        return view('search', compact('products', 'query'));
    }
}

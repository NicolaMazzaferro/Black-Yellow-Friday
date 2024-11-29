<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    /**
     * I campi assegnabili in massa
     */
    protected $fillable = [
        'product_id',
        'user_id',
        'content',
        'rating',
    ];

    /**
     * Relazione con il prodotto
     */
    public function product()
    {
        return $this->belongsTo(Product::class); // Una recensione appartiene a un prodotto
    }

    /**
     * Relazione con l' utente
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

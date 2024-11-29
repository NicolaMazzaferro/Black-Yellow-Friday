<?php

namespace App\Models;

use App\Models\Category;
use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory, Searchable;

    /**
     * Campi asseganbili in massa
     */
    protected $fillable = [
        'name',
        'description',
        'price',
        'image',
        'discount'
    ];

    /**
     * Relazione con le recensioni
     */
    public function reviews()
    {
        return $this->hasMany(Review::class); // Un prodotto ha molte recensioni
    }

    /**
     * La relazione con la categoria.
     */
    public function category()
    {
        return $this->belongsTo(Category::class); // Un prodotto appartiene a una categoria
    }

    /**
     * Calcola il prezzo scontato.
     */
    public function getDiscountedPriceAttribute()
    {
        if ($this->discount > 0) {
            return $this->price - ($this->price * $this->discount / 100);
        }
        return $this->price;
    }   
    
    /**
     * I campi da indicizzare.
     */
    public function toSearchableArray()
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
        ];
    }
}

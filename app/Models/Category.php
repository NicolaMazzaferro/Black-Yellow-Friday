<?php

namespace App\Models;

use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{

    use HasFactory, Searchable;
    
    /**
     * I campi assegnabili in massa
     */
    protected $fillable = ['name', 'description'];

    /**
     * Relazione con i prodotti.
     */
    public function products()
    {
        return $this->hasMany(Product::class); // Una categoria ha molti prodotti
    }

    /**
     * I campi da indicizzare.
     */
    public function toSearchableArray()
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
        ];
    }
}

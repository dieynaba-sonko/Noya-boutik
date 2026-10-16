<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductImage extends Model
{
    // Colonnes qu'on a le droit de remplir en masse
    protected $fillable = [
        'product_id',
        'path',
        'alt_text',
        'is_main',
        'sort_order',
    ];

    // Conversion automatique des types
    protected function casts(): array
    {
        return [
            'is_main' => 'boolean',
            'sort_order' => 'integer',
        ];
    }

    // Une image appartient à un produit
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}

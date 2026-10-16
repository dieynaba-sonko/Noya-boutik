<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    // Active la "suppression douce" (colonne deleted_at)
    use SoftDeletes;

    // Colonnes qu'on a le droit de remplir en masse
    protected $fillable = [
        'category_id',
        'name',
        'slug',
        'description',
        'price',
        'stock_quantity',
        'is_active',
    ];

    // Conversion automatique des types
    protected function casts(): array
    {
        return [
            'price' => 'integer',
            'stock_quantity' => 'integer',
            'is_active' => 'boolean',
        ];
    }

    // Un produit appartient à une catégorie
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    // Un produit a plusieurs images
    public function images(): HasMany
    {
        return $this->hasMany(ProductImage::class);
    }
}
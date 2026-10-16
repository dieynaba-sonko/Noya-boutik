<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    // Colonnes qu'on a le droit de remplir en masse
    protected $fillable = [
        'parent_id',
        'name',
        'slug',
        'description',
        'is_active',
        'sort_order',
    ];

    // Conversion automatique des types
    protected function casts(): array
    {
        return [
            'is_active' => 'boolean',
        ];
    }

    // Une catégorie a un parent (ou aucun)
    public function parent(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    // Une catégorie a plusieurs sous-catégories
    public function children(): HasMany
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    // Une catégorie a plusieurs produits
    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }
}
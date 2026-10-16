<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Cart extends Model
{
    protected $fillable = [
        'session_id',
        'user_id',
    ];

    // Un panier appartient à un utilisateur (ou aucun)
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // Un panier a plusieurs articles
    public function items(): HasMany
    {
        return $this->hasMany(CartItem::class);
    }
}
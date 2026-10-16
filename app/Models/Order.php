<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    protected $fillable = [
        'reference',
        'user_id',
        'delivery_zone_id',
        'status',
        'customer_name',
        'customer_phone',
        'delivery_address',
        'notes',
        'subtotal',
        'delivery_fee',
        'total',
        'confirmed_at',
    ];

    protected function casts(): array
    {
        return [
            'subtotal' => 'integer',
            'delivery_fee' => 'integer',
            'total' => 'integer',
            'confirmed_at' => 'datetime',
        ];
    }

    // Une commande appartient à un utilisateur (ou aucun)
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // Une commande appartient à une zone de livraison
    public function deliveryZone(): BelongsTo
    {
        return $this->belongsTo(DeliveryZone::class);
    }

    // Une commande a plusieurs lignes d'articles
    public function items(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }

    // Une commande a plusieurs paiements
    public function payments(): HasMany
    {
        return $this->hasMany(Payment::class);
    }
}
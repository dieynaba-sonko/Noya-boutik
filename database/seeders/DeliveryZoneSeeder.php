<?php

namespace Database\Seeders;

use App\Models\DeliveryZone;
use Illuminate\Database\Seeder;

class DeliveryZoneSeeder extends Seeder
{
    public function run(): void
    {
        $zones = [
            [
                'name'           => 'Dakar',
                'description'    => 'Dakar et sa banlieue (livraison gratuite)',
                'fee'            => 0,
                'estimated_days' => 1,
                'sort_order'     => 1,
            ],
            [
                'name'           => 'Autres régions du Sénégal',
                'description'    => 'Thiès, Saint-Louis, Touba, Kaolack, Ziguinchor...',
                'fee'            => 2000,
                'estimated_days' => 3,
                'sort_order'     => 2,
            ],
        ];

        foreach ($zones as $zone) {
            DeliveryZone::updateOrCreate(
                ['name' => $zone['name']],
                $zone + ['is_active' => true]
            );
        }
    }
}
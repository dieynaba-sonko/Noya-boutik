<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        // L'ordre compte : les produits ont besoin des catégories
        $this->call([
            CategorySeeder::class,
            DeliveryZoneSeeder::class,
            ProductSeeder::class,
        ]);
    }
}
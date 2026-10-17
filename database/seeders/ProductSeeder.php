<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        // slug de la sous-catégorie => liste de produits
        $produits = [
            'robes' => [
                ['Robe wax élégante', 'robe-wax-elegante', 15000, 12,
                 'Robe longue en tissu wax aux motifs colorés, coupe ajustée à la taille.'],
                ['Robe de soirée noire', 'robe-soiree-noire', 25000, 8,
                 'Robe noire élégante, idéale pour les cérémonies et les soirées.'],
            ],
            'chaussures' => [
                ['Sandales en cuir', 'sandales-cuir', 8000, 20,
                 'Sandales confortables en cuir véritable, faites main.'],
                ['Baskets blanches', 'baskets-blanches', 18000, 15,
                 'Baskets blanches légères, adaptées à un usage de tous les jours.'],
            ],
            'soins-peau' => [
                ['Beurre de karité pur', 'beurre-karite-pur', 3500, 40,
                 'Beurre de karité naturel pour hydrater la peau et les cheveux. Pot de 200 g.'],
                ['Savon noir africain', 'savon-noir-africain', 2000, 50,
                 'Savon noir traditionnel pour nettoyer et purifier la peau.'],
            ],
            'parfums' => [
                ['Parfum floral 50 ml', 'parfum-floral-50ml', 12000, 10,
                 'Parfum aux notes florales et fruitées. Flacon de 50 ml.'],
                ['Encens et bakhour', 'encens-bakhour', 4500, 25,
                 'Bakhour traditionnel pour parfumer la maison et les vêtements.'],
            ],
            'decoration' => [
                ['Coussin en tissu wax', 'coussin-wax', 6000, 18,
                 'Coussin décoratif de 40 x 40 cm avec housse en wax déhoussable.'],
                ['Panier en raphia', 'panier-raphia', 5000, 22,
                 'Panier tressé à la main, pratique pour le rangement et la décoration.'],
            ],
            'telephones' => [
                ['Écouteurs sans fil', 'ecouteurs-sans-fil', 9000, 30,
                 'Écouteurs Bluetooth avec boîtier de charge.'],
                ['Chargeur rapide USB-C', 'chargeur-rapide-usbc', 4000, 45,
                 'Chargeur rapide avec câble USB-C inclus.'],
            ],
        ];

        foreach ($produits as $slugCategorie => $liste) {
            $categorie = Category::where('slug', $slugCategorie)->first();

            foreach ($liste as [$nom, $slug, $prix, $stock, $description]) {
                Product::updateOrCreate(
                    ['slug' => $slug],
                    [
                        'category_id'    => $categorie->id,
                        'name'           => $nom,
                        'description'    => $description,
                        'price'          => $prix,
                        'stock_quantity' => $stock,
                        'is_active'      => true,
                    ]
                );
            }
        }
    }
}
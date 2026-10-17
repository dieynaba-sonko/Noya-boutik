<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        // Catégories principales : slug => [nom, description]
        $principales = [
            'mode'        => ['Mode', 'Vêtements, chaussures et accessoires'],
            'beaute'      => ['Beauté', 'Soins, parfums et cosmétiques'],
            'maison'      => ['Maison', 'Décoration et articles pour la maison'],
            'electronique' => ['Électronique', 'Téléphones, accessoires et appareils'],
        ];

        $ordre = 1;
        foreach ($principales as $slug => [$nom, $description]) {
            Category::updateOrCreate(
                ['slug' => $slug],
                [
                    'name'        => $nom,
                    'description' => $description,
                    'is_active'   => true,
                    'sort_order'  => $ordre++,
                ]
            );
        }

        // Sous-catégories : slug => [nom, slug du parent]
        $sousCategories = [
            'robes'        => ['Robes', 'mode'],
            'chaussures'   => ['Chaussures', 'mode'],
            'soins-peau'   => ['Soins de la peau', 'beaute'],
            'parfums'      => ['Parfums', 'beaute'],
            'decoration'   => ['Décoration', 'maison'],
            'telephones'   => ['Téléphones', 'electronique'],
        ];

        $ordre = 1;
        foreach ($sousCategories as $slug => [$nom, $slugParent]) {
            $parent = Category::where('slug', $slugParent)->first();

            Category::updateOrCreate(
                ['slug' => $slug],
                [
                    'parent_id'  => $parent->id,
                    'name'       => $nom,
                    'is_active'  => true,
                    'sort_order' => $ordre++,
                ]
            );
        }
    }
}
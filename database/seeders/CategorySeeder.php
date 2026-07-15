<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Electronicos',
                'description' => 'Articulos Electronicos'
            ],
            [
                'name' => 'Ropa',
                'description' => 'Articulos de Ropa'
            ],
            [
                'name' => 'Alimentos',
                'description' => 'Articulos Alimentos'
            ],
            [
                'name' => 'Hogar',
                'description' => 'Articulos Domesticos'
            ],
            [
                'name' => 'Jugetes',
                'description' => 'Articulos Divertidos'
            ]
        ];
        foreach($categories as $category) {
            Category::create($category);
        }
    }
}

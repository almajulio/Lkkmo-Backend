<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Subcategory;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'Cosplay',
            'Carnaval'
        ];

        $subcategoriescosplay = [
            'Anime', 'Comic', 'Game'
        ];

        $subcategoriescarnaval = [
            'Pakaian Adat', 'Pakaian Peringatan'
        ];

        foreach ($categories as $category) {
            Category::create(['name' => $category]);
        }

        foreach ($subcategoriescosplay as $subcategory) {
            Subcategory::create(['name' => $subcategory, 'category_id' => 1]);
        }

        foreach ($subcategoriescarnaval as $subcategory) {
            Subcategory::create(['name' => $subcategory, 'category_id' => 2]);
        }
    }
}

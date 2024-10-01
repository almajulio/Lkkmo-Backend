<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Review;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

       Product::create([
           'name' => 'Product 1',
           'price' => 100000,
           'description' => 'Deskripsi 1',
           'stock' => 10,
           'image' => 'image.png',
           'category_id' => 1,
           'subcategory_id' => 1,
           'size' => 'S',
       ]);

       Review::create([
           'user_id' => 1,
           'product_id' => 1,
           'rating' => 5,
           'comment' => 'Review 1',
       ]);

        $this->call(RoleSeeder::class);
    }
}

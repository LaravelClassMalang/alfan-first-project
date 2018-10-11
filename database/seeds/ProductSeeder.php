<?php

use Illuminate\Database\Seeder;
use App\Product;
use App\Category;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = Category::inRandomOrder()->first();
        for($i = 1; $i <= 5; $i++) {
            Product::create([
                'product_name' => 'Product '. $i, 'price' => $i.'000', 'stock' => $i++, 'category_id' => $category->category_id,
            ]);
        }
    }
}

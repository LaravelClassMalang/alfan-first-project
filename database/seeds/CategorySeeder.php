<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // for($i = 1; $i <= 5; $i++) {
        //     Category::create([
        //         'category_name' => 'Dummy Category'. $i,
        //     ]);
        // }
        
        factory(App\Category::class, 5)->create()->each(function ($category) {
            $category->products()->save(factory(App\Category::class)->make());
        });
    }
}

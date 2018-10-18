<?php

use Illuminate\Database\Seeder;
use App\Order;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('orders')->delete();
        for($i = 1; $i <= 6; $i++) {
            Order::create([
                'product_id' => 1,
                'user_id' => $i,
            ]);
        }
    }
}

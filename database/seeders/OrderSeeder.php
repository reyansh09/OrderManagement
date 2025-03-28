<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Str;

class OrderSeeder extends Seeder
{
    public function run()
    {
        for ($i = 1; $i <= 5; $i++) {
            $order = Order::create([
                'order_id' => Str::random(10),
                'buyer_name' => 'Customer ' . $i,
                'email' => 'customer' . $i . '@example.com',
                'phone' => '987654321' . $i,
                'address' => 'Address ' . $i,
                'total_price' => rand(500, 5000),
                'status' => 'pending',
            ]);

            for ($j = 1; $j <= rand(1, 3); $j++) {
                Product::create([
                    'order_id' => $order->id,
                    'product_name' => 'Product ' . $j,
                    'price' => rand(100, 1000),
                    'quantity' => rand(1, 5),
                ]);
            }
        }
    }
}


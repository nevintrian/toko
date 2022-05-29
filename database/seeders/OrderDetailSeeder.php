<?php

namespace Database\Seeders;

use App\Models\OrderDetail;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        OrderDetail::create([
            'order_id' => 1,
            'product_id' => 1,
            'quantity' => 2,
            'subtotal' => 400000
        ]);

        OrderDetail::create([
            'order_id' => 1,
            'product_id' => 2,
            'quantity' => 1,
            'subtotal' => 150000
        ]);

        OrderDetail::create([
            'order_id' => 2,
            'product_id' => 2,
            'quantity' => 3,
            'subtotal' => 450000
        ]);
    }
}

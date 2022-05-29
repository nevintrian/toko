<?php

namespace Database\Seeders;

use App\Models\Order;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Order::create([
            'code' => 'Or001',
            'date' => now(),
            'customer_name' => 'Nevin Trian',
            'total_price' => 250000,
            'status' => 1
        ]);

        Order::create([
            'code' => 'Or002',
            'date' => now(),
            'customer_name' => 'Ade Putera',
            'total_price' => 150000,
            'status' => 1
        ]);
    }
}

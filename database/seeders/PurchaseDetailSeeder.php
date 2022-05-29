<?php

namespace Database\Seeders;

use App\Models\PurchaseDetail;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PurchaseDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PurchaseDetail::create([
            'purchase_id' => 1,
            'product_id' => 1,
            'quantity' => 1,
            'subtotal' => 200000
        ]);

        PurchaseDetail::create([
            'purchase_id' => 1,
            'product_id' => 2,
            'quantity' => 2,
            'subtotal' => 300000
        ]);

        PurchaseDetail::create([
            'purchase_id' => 2,
            'product_id' => 1,
            'quantity' => 4,
            'subtotal' => 800000
        ]);
    }
}

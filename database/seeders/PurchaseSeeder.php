<?php

namespace Database\Seeders;

use App\Models\Purchase;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PurchaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Purchase::create([
            'code' => 'Pr001',
            'date' => now(),
            'supplier_name' => 'Toko Emas Jaya',
            'total_price' => 250000,
            'status' => 1
        ]);

        Purchase::create([
            'code' => 'Pr002',
            'date' => now(),
            'supplier_name' => 'Toko Kurniawan',
            'total_price' => 150000,
            'status' => 1
        ]);
    }
}

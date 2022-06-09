<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
            'code' => 'P001',
            'name' => 'baju 1',
            'category_id' => 1,
            'brand' => 'Adidas',
            'description' => 'ready ukuran m dan l',
            'stock' => 5,
            'price' => 200000,
            'sold' => 2,
            'status' => 0,
            'image' => '20220608055906.png'
        ]);
        Product::create([
            'code' => 'P002',
            'name' => 'baju 2',
            'category_id' => 1,
            'brand' => 'Nike',
            'description' => 'ready ukuran m dan l',
            'stock' => 9,
            'price' => 150000,
            'sold' => 3,
            'status' => 0,
            'image' => '20220608055906.png'
        ]);
        Product::create([
            'code' => 'P003',
            'name' => 'baju 3',
            'category_id' => 1,
            'brand' => 'Uniqlo',
            'description' => 'ready ukuran m dan l',
            'stock' => 7,
            'price' => 100000,
            'sold' => 5,
            'status' => 1,
            'image' => '20220608055906.png'
        ]);
        Product::create([
            'code' => 'P004',
            'name' => 'celana 1',
            'category_id' => 2,
            'brand' => 'Uniqlo',
            'description' => 'ready ukuran m dan l',
            'stock' => 4,
            'price' => 120000,
            'sold' => 5,
            'status' => 0,
            'image' => '20220608055906.png'
        ]);
        Product::create([
            'code' => 'P005',
            'name' => 'kemeja 1',
            'category_id' => 3,
            'brand' => 'Uniqlo',
            'description' => 'ready ukuran m dan l',
            'stock' => 14,
            'price' => 140000,
            'sold' => 15,
            'status' => 0,
            'image' => '20220608055906.png'
        ]);
    }
}

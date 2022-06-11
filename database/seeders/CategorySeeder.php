<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'name' => 'Baju',
            'image' => '20220608055906.png'
        ]);
        Category::create([
            'name' => 'Celana',
            'image' => '20220608055906.png'
        ]);
        Category::create([
            'name' => 'Kemeja',
            'image' => '20220608055906.png'
        ]);
        Category::create([
            'name' => 'Jaket',
            'image' => '20220608055906.png'
        ]);
        Category::create([
            'name' => 'Sepatu',
            'image' => '20220608055906.png'
        ]);
        Category::create([
            'name' => 'Topi',
            'image' => '20220608055906.png'
        ]);
        Category::create([
            'name' => 'Masker',
            'image' => '20220608055906.png'
        ]);
        Category::create([
            'name' => 'Baju Tidur',
            'image' => '20220608055906.png'
        ]);
        Category::create([
            'name' => 'Hoodie',
            'image' => '20220608055906.png'
        ]);
        Category::create([
            'name' => 'Mantel',
            'image' => '20220608055906.png'
        ]);
    }
}

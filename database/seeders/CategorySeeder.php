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
            'name' => 'Baju'
        ]);

        Category::create([
            'name' => 'Celana'
        ]);

        Category::create([
            'name' => 'Kemeja'
        ]);

        Category::create([
            'name' => 'Jaket'
        ]);
    }
}

<?php

namespace Database\Seeders;
use App\Models\Home;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HomeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Home::create([
            'title' => 'Halaman Home',
            'content' => 'Ini adalah halaman home, tuliskan deskripsi yang panjang disini',
            'contact_id' => 1,
            'image' => '20220608222721.png'
        ]);

        Home::create([
            'title' => 'Mengapa membeli di toko ini?',
            'content' => 'Karena toko ini sangat bagus, tuliskan alasan mengapa membeli toko ini disini',
            'contact_id' => 1,
            'image' => '20220608222721.png'
        ]);
    }
}

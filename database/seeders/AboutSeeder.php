<?php

namespace Database\Seeders;
use App\Models\About;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AboutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        About::create([
            'title' => 'Halaman About',
            'content' => 'Ini adalah halaman about'
        ]);
    }
}

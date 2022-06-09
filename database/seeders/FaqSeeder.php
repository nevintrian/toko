<?php

namespace Database\Seeders;

use App\Models\Faq;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FaqSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Faq::create([
            'question' => 'Apa nama barang?',
            'answer' => 'ini adalah buku'
        ]);
        Faq::create([
            'question' => 'Apa nama buku ini?',
            'answer' => 'ini adalah komik'
        ]);
    }
}

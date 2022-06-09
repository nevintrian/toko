<?php

namespace Database\Seeders;
use App\Models\Contact;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Contact::create([
            'name' => 'Nevin Trian Ade',
            'phone' => '82234706515',
            'address' => 'Jalan Taman Kampus Jember Merdeka 2'
        ]);
    }
}

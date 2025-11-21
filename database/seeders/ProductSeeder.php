<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([
            'name' => 'bolen',
            'photo_product' => 'bolen.jpg',
            'price' => '2500',
            'description' => 'kue',   
        ]);

        Product::create([
            'name' => 'pai brownis',
            'photo_product' => 'paibrow.jpg',
            'price' => '2200',
            'description' => 'kue',   
        ]);

        Product::create([
            'name' => 'soes',
            'photo_product' => 'soes.jpg',
            'price' => '2300',
            'description' => 'kue',   
        ]);

        Product::create([
            'name' => 'risol mayo',
            'photo_product' => 'risma.jpg',
            'price' => '1800',
            'description' => 'gorengan',   
        ]);

        Product::create([
            'name' => 'risol ayam',
            'photo_product' => 'riya.jpg',
            'price' => '1600',
            'description' => 'gorengan',   
        ]);
    }
}

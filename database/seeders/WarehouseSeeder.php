<?php

namespace Database\Seeders;

use App\Models\Warehouse;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WarehouseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Warehouse::create([
            'name_product' => '1',
            'stock' => '100'
        ]);

        Warehouse::create([
            'name_product' => '2',
            'stock' => '50'
        ]);

        Warehouse::create([
            'name_product' => '3',
            'stock' => '48'
        ]);

        Warehouse::create([
            'name_product' => '4',
            'stock' => '30'
        ]);

        Warehouse::create([
            'name_product' => '5',
            'stock' => '20'
        ]);
    }
}

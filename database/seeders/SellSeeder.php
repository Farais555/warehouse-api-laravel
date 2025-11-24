<?php

namespace Database\Seeders;

use App\Models\Sell;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SellSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Sell::create([
            'product_id' => '1',
            'store_id' => '1',
            'quantity' => '48',
            'date_sell' => '2025-11-12',
            'user_id' => '1'
        ]);

        Sell::create([
            'product_id' => '1',
            'store_id' => '2',
            'quantity' => '20',
            'date_sell' => '2025-11-12',
            'user_id' => '1'
        ]);

        Sell::create([
            'product_id' => '1',
            'store_id' => '3',
            'quantity' => '15',
            'date_sell' => '2025-11-12',
            'user_id' => '1'
        ]);

        Sell::create([
            'product_id' => '2',
            'store_id' => '1',
            'quantity' => '24',
            'date_sell' => '2025-11-12',
            'user_id' => '1'
        ]);

        Sell::create([
            'product_id' => '4',
            'store_id' => '3',
            'quantity' => '20',
            'date_sell' => '2025-11-12',
            'user_id' => '1'
        ]);

        Sell::create([
            'product_id' => '5',
            'store_id' => '3',
            'quantity' => '20',
            'date_sell' => '2025-11-12',
            'user_id' => '1'
        ]);

        Sell::create([
            'product_id' => '3',
            'store_id' => '4',
            'quantity' => '15',
            'date_sell' => '2025-11-12',
            'user_id' => '1'
        ]);
    }
}

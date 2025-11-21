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
            'name_product' => '1',
            'name_store' => '1',
            'quantity' => '48',
            'date_sell' => '2025-11-12',
            'onDuty' => '1'
        ]);

        Sell::create([
            'name_product' => '1',
            'name_store' => '2',
            'quantity' => '20',
            'date_sell' => '2025-11-12',
            'onDuty' => '1'
        ]);

        Sell::create([
            'name_product' => '1',
            'name_store' => '3',
            'quantity' => '15',
            'date_sell' => '2025-11-12',
            'onDuty' => '1'
        ]);

        Sell::create([
            'name_product' => '2',
            'name_store' => '1',
            'quantity' => '24',
            'date_sell' => '2025-11-12',
            'onDuty' => '1'
        ]);

        Sell::create([
            'name_product' => '4',
            'name_store' => '3',
            'quantity' => '20',
            'date_sell' => '2025-11-12',
            'onDuty' => '1'
        ]);

        Sell::create([
            'name_product' => '5',
            'name_store' => '3',
            'quantity' => '20',
            'date_sell' => '2025-11-12',
            'onDuty' => '1'
        ]);

        Sell::create([
            'name_product' => '3',
            'name_store' => '4',
            'quantity' => '15',
            'date_sell' => '2025-11-12',
            'onDuty' => '1'
        ]);
    }
}

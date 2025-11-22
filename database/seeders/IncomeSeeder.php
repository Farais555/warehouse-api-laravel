<?php

namespace Database\Seeders;

use App\Models\Income;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class IncomeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Income::create([
            'product_id' => '1',
            'store_id' => '1',
            'sold' => '37',
            'onDuty' => '1'
        ]);

        Income::create([
            'product_id' => '1',
            'store_id' => '2',
            'sold' => '17',
            'onDuty' => '1'
        ]);

        Income::create([
            'product_id' => '1',
            'store_id' => '3',
            'sold' => '12',
            'onDuty' => '1'
        ]);

        Income::create([
            'product_id' => '2',
            'store_id' => '1',
            'sold' => '20',
            'onDuty' => '1'
        ]);

        Income::create([
            'product_id' => '4',
            'store_id' => '3',
            'sold' => '19',
            'onDuty' => '1'
        ]);

        Income::create([
            'product_id' => '5',
            'store_id' => '3',
            'sold' => '19',
            'onDuty' => '1'
        ]);

        Income::create([
            'product_id' => '3',
            'store_id' => '4',
            'sold' => '13',
            'onDuty' => '1'
        ]);
    }
}

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
            'name_product' => '1',
            'name_store' => '1',
            'sold' => '37',
            'onDuty' => '1'
        ]);

        Income::create([
            'name_product' => '1',
            'name_store' => '2',
            'sold' => '17',
            'onDuty' => '1'
        ]);

        Income::create([
            'name_product' => '1',
            'name_store' => '3',
            'sold' => '12',
            'onDuty' => '1'
        ]);

        Income::create([
            'name_product' => '2',
            'name_store' => '1',
            'sold' => '20',
            'onDuty' => '1'
        ]);

        Income::create([
            'name_product' => '4',
            'name_store' => '3',
            'sold' => '19',
            'onDuty' => '1'
        ]);

        Income::create([
            'name_product' => '5',
            'name_store' => '3',
            'sold' => '19',
            'onDuty' => '1'
        ]);

        Income::create([
            'name_product' => '3',
            'name_store' => '4',
            'sold' => '13',
            'onDuty' => '1'
        ]);
    }
}

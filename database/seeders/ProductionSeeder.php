<?php

namespace Database\Seeders;

use App\Models\Production;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Production::create([
            'name_product' => '1',
            'quantity' => '100',
            'production_date' => '2025-11-11',
            'description' => '-',
            'onDuty' => '1',        
        ]);

        Production::create([
            'name_product' => '2',
            'quantity' => '50',
            'production_date' => '2025-11-11',
            'description' => '-',
            'onDuty' => '1',        
        ]);

        Production::create([
            'name_product' => '3',
            'quantity' => '48',
            'production_date' => '2025-11-11',
            'description' => '-',
            'onDuty' => '1',        
        ]);

        Production::create([
            'name_product' => '4',
            'quantity' => '30',
            'production_date' => '2025-11-11',
            'description' => '-',
            'onDuty' => '1',        
        ]);

        Production::create([
            'name_product' => '5',
            'quantity' => '20',
            'production_date' => '2025-11-11',
            'description' => '-',
            'onDuty' => '1',        
        ]);
    }
}

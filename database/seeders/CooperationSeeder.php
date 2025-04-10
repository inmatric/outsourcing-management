<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CooperationSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('cooperations')->insert([
            [
                'id' => 1,
                'company_name' => 'PT Maju Jaya',
                'cooperation_type' => 'Outsourcing',
                'start_date' => '2023-01-01',
                'end_date' => '2024-01-01',
                'status' => 'active',
                'contact_person' => '081234567890',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'company_name' => 'CV Karya Bersama',
                'cooperation_type' => 'Partnership',
                'start_date' => '2023-06-15',
                'end_date' => '2025-06-15',
                'status' => 'active',
                'contact_person' => '082345678901',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 3,
                'company_name' => 'PT Solusi Digital',
                'cooperation_type' => 'Vendor',
                'start_date' => '2022-08-10',
                'end_date' => '2023-08-10',
                'status' => 'inactive',
                'contact_person' => '083456789012',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Cooperation;
use Carbon\Carbon;

class CooperationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Cooperation::insert([
            [
                'company_name'     => 'PT. Alpha Outsourcing',
                'cooperation_type' => 'Cleaning Service',
                'start_date'       => Carbon::parse('2024-01-01'),
                'end_date'         => Carbon::parse('2024-12-31'),
                'status'           => 'active',
                'contract_file'    => 'contracts/alpha.pdf',
                'created_at'       => now(),
                'updated_at'       => now(),
            ],
            [
                'company_name'     => 'PT. Beta Security',
                'cooperation_type' => 'Security',
                'start_date'       => Carbon::parse('2023-06-01'),
                'end_date'         => Carbon::parse('2024-05-31'),
                'status'           => 'inactive',
                'contract_file'    => 'contracts/beta.pdf',
                'created_at'       => now(),
                'updated_at'       => now(),
            ],
            [
                'company_name'     => 'PT. Gamma Proteksi',
                'cooperation_type' => 'Security',
                'start_date'       => Carbon::parse('2024-03-01'),
                'end_date'         => Carbon::parse('2025-02-28'),
                'status'           => 'active',
                'contract_file'    => 'contracts/gamma.pdf',
                'created_at'       => now(),
                'updated_at'       => now(),
            ],
        ]);
    }
}

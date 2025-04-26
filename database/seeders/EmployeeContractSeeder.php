<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class EmployeeContractSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('employee_contracts')->insert([
            [
                'employee_id' => '1',
                'contract_number' => 'CT-2025-001',
                'start_date' => Carbon::now()->subMonths(6)->toDateString(),
                'end_date' => Carbon::now()->addMonths(6)->toDateString(),
                'position' => 'Software Engineer',
                'location_id' => 101,
                'working_hours' => 'Full-time',
                'salary' => '10000000',
                'status' => 'active',
                'contract_file' => 'contracts/ct-2025-001.pdf',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'employee_id' => '2',
                'contract_number' => 'CT-2025-002',
                'start_date' => Carbon::now()->subYears(1)->toDateString(),
                'end_date' => Carbon::now()->subMonths(1)->toDateString(),
                'position' => 'HR Specialist',
                'location_id' => 102,
                'working_hours' => 'Part-time',
                'salary' => '6000000',
                'status' => 'terminated',
                'contract_file' => 'contracts/ct-2025-002.pdf',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'employee_id' => '3',
                'contract_number' => 'CT-2025-003',
                'start_date' => Carbon::now()->toDateString(),
                'end_date' => null,
                'position' => 'Technician',
                'location_id' => 103,
                'working_hours' => 'Shift-based',
                'salary' => '7500000',
                'status' => 'inactive',
                'contract_file' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CooperationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = Carbon::now();

        DB::table('cooperations')->insert([
            [
                'company_name' => 'Politeknik Negeri Cilacap',
                'cooperation_type' => 'Security Service',
                'start_date' => '2025-01-01',
                'end_date' => '2025-12-31',
                'status' => 'active',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'company_name' => 'PT Sukses Bersama',
                'cooperation_type' => 'Cleaning Service',
                'start_date' => '2025-02-15',
                'end_date' => '2025-08-15',
                'status' => 'active',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'company_name' => 'PT Aman Sentosa',
                'cooperation_type' => 'Logistics',
                'start_date' => '2024-07-01',
                'end_date' => '2025-07-01',
                'status' => 'inactive',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'company_name' => 'SMK Negeri 1',
                'cooperation_type' => 'Catering',
                'start_date' => '2025-03-01',
                'end_date' => '2025-09-01',
                'status' => 'active',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'company_name' => 'Universitas Teknologi',
                'cooperation_type' => 'IT Support',
                'start_date' => '2025-01-15',
                'end_date' => '2025-12-15',
                'status' => 'active',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'company_name' => 'CV Sejahtera',
                'cooperation_type' => 'Cleaning Service',
                'start_date' => '2024-09-01',
                'end_date' => '2025-03-01',
                'status' => 'inactive',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'company_name' => 'PT Bangun Mandiri',
                'cooperation_type' => 'Transport Service',
                'start_date' => '2025-04-01',
                'end_date' => '2025-10-01',
                'status' => 'active',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'company_name' => 'PT Digital Inovasi',
                'cooperation_type' => 'Printing',
                'start_date' => '2025-02-01',
                'end_date' => '2025-08-01',
                'status' => 'active',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'company_name' => 'Sekolah Harapan',
                'cooperation_type' => 'Advertising',
                'start_date' => '2024-11-01',
                'end_date' => '2025-11-01',
                'status' => 'inactive',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'company_name' => 'Puskesmas Utama',
                'cooperation_type' => 'Renovation Service',
                'start_date' => '2025-05-01',
                'end_date' => '2025-11-30',
                'status' => 'active',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'company_name' => 'Politeknik Negeri Cilacap',
                'cooperation_type' => 'Health Check-up',
                'start_date' => '2025-03-10',
                'end_date' => '2025-06-10',
                'status' => 'active',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'company_name' => 'PT Sukses Bersama',
                'cooperation_type' => 'Security Service',
                'start_date' => '2024-12-01',
                'end_date' => '2025-06-01',
                'status' => 'inactive',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'company_name' => 'PT Aman Sentosa',
                'cooperation_type' => 'Cleaning Service',
                'start_date' => '2025-01-10',
                'end_date' => '2025-07-10',
                'status' => 'active',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'company_name' => 'SMK Negeri 1',
                'cooperation_type' => 'Maintenance',
                'start_date' => '2025-04-01',
                'end_date' => '2025-10-01',
                'status' => 'active',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'company_name' => 'Universitas Teknologi',
                'cooperation_type' => 'Internet Provider',
                'start_date' => '2025-02-20',
                'end_date' => '2025-08-20',
                'status' => 'active',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'company_name' => 'CV Sejahtera',
                'cooperation_type' => 'Electrical Service',
                'start_date' => '2025-01-25',
                'end_date' => '2025-07-25',
                'status' => 'active',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'company_name' => 'PT Bangun Mandiri',
                'cooperation_type' => 'Catering',
                'start_date' => '2025-03-15',
                'end_date' => '2025-09-15',
                'status' => 'active',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'company_name' => 'PT Digital Inovasi',
                'cooperation_type' => 'Logistics',
                'start_date' => '2025-01-05',
                'end_date' => '2025-07-05',
                'status' => 'inactive',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'company_name' => 'Sekolah Harapan',
                'cooperation_type' => 'Construction',
                'start_date' => '2025-04-10',
                'end_date' => '2025-12-10',
                'status' => 'active',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'company_name' => 'Puskesmas Utama',
                'cooperation_type' => 'Transport Service',
                'start_date' => '2025-02-05',
                'end_date' => '2025-08-05',
                'status' => 'active',
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ]);
    }
}

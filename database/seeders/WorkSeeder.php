<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WorkSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('works')->insert([
            [
                'id' => 1,
                'job_name' => 'Cleaning Service',
                'task_type' => 'OB Taman',
                'task_details' => 'Mengelola kebersihan taman',
                'salary_per_person' => '1-3 juta'
            ],
            [
                'id' => 2,
                'job_name' => 'Cleaning Service',
                'task_type' => 'OB Ruangan Gedung A',
                'task_details' => 'Membersihkan ruangan gedung A lantai 1',
                'salary_per_person' => '500-900 ribu'
            ],
            [
                'id' => 3,
                'job_name' => 'Security',
                'task_type' => 'Keamanan',
                'task_details' => 'Patroli area malam',
                'salary_per_person' => '4-7 juta'
            ],
            [
                'id' => 4,
                'job_name' => 'Security',
                'task_type' => 'Petugas Parkir',
                'task_details' => 'Menjaga keamanan parkir',
                'salary_per_person' => '1-3 juta'
            ],
        ]);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ComplaintResolutionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('complaint_resolution')->insert([
            // Data 1 - Masalah kebersihan yang sudah dibersihkan
            [
                'date' => '2023-10-15',
                'employee_id' => 1, // Asumsi employee dengan id 1 ada
                'complaint_id' => 1, // Asumsi complaint dengan id 1 ada
                'doings' => 'dibersihkan',
                'photo_evidence' => 'cleaning_evidence1.jpg',
                'location_id' => 1, // Asumsi location dengan id 1 ada
                'status' => 'resolved',
                'notes' => 'Area sudah dibersihkan secara menyeluruh',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Data 2 - Masalah peralatan yang diperbaiki
            [
                'date' => '2023-10-16',
                'employee_id' => 2,
                'complaint_id' => 2,
                'doings' => 'diperbaiki',
                'photo_evidence' => 'repair_evidence1.jpg',
                'location_id' => 2,
                'status' => 'processed',
                'notes' => 'Peralatan berhasil diperbaiki, menunggu konfirmasi',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Data 3 - Masalah fasilitas yang diganti
            [
                'date' => '2023-10-17',
                'employee_id' => 3,
                'complaint_id' => 3,
                'doings' => 'diganti',
                'photo_evidence' => 'replacement_evidence1.jpg',
                'location_id' => 3,
                'status' => 'resolved',
                'notes' => 'Fasilitas rusak telah diganti dengan yang baru',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Data 4 - Masalah yang masih pending
            [
                'date' => '2023-10-18',
                'employee_id' => 4,
                'complaint_id' => 4,
                'doings' => 'dibersihkan',
                'photo_evidence' => null,
                'location_id' => 4,
                'status' => 'pending',
                'notes' => 'Menunggu persetujuan untuk penanganan',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}

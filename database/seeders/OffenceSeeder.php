<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class OffenceSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('offences')->insert([
            [
                'employee_id' => 1,
                'date' => Carbon::now()->subDays(3)->toDateString(),
                'offence_category' => 'Kedisiplinan',
                'offence_description' => 'Datang terlambat lebih dari 30 menit.',
                'image' => null, // Contoh: null, bisa diisi dengan file_get_contents() kalau pakai file asli
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'employee_id' => 2,
                'date' => Carbon::now()->subDays(1)->toDateString(),
                'offence_category' => 'Perilaku',
                'offence_description' => 'Bersikap tidak sopan kepada atasan.',
                'image' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'employee_id' => 3,
                'date' => Carbon::now()->toDateString(),
                'offence_category' => 'Kerapihan',
                'offence_description' => 'Tidak mengenakan seragam lengkap.',
                'image' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

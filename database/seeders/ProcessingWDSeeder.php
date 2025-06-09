<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;

class ProcessingWDSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('processing_w_d_s')->insert([
            [
                'employee_id' => 1,
                'work_id' => 1, // pastikan work dengan id 1 ada
                'start_time' => Carbon::now()->subHours(2),
                'end_time' => Carbon::now(),
                'duration_sec' => 7200,
                'photo_before_path' => 'photos/before/photo1.jpg',
                'photo_after_path' => 'photos/after/photo1.jpg',
                'status' => 'completed',
                'notes' => 'Pekerjaan selesai dengan baik.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'employee_id' => 2,
                'work_id' => 2,
                'start_time' => Carbon::now()->subHour(),
                'end_time' => null,
                'duration_sec' => null,
                'photo_before_path' => 'photos/before/photo2.jpg',
                'photo_after_path' => null,
                'status' => 'inprogress',
                'notes' => 'Sedang dikerjakan.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'employee_id' => 3,
                'work_id' => 3,
                'start_time' => null,
                'end_time' => null,
                'duration_sec' => null,
                'photo_before_path' => null,
                'photo_after_path' => null,
                'status' => 'pending',
                'notes' => 'Menunggu penugasan.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

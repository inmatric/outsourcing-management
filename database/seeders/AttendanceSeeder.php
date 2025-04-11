<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AttendanceSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('attendances')->insert([
            [
                'employee_id' => 1,
                'date' => Carbon::now()->toDateString(),
                'start_time' => Carbon::now()->subHours(8),
                'end_time' => Carbon::now(),
                'photo' => 'photos/attendance/photo1.jpg',
                'status' => 'completed',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'employee_id' => 2,
                'date' => Carbon::now()->toDateString(),
                'start_time' => Carbon::now()->subHours(6),
                'end_time' => null,
                'photo' => 'photos/attendance/photo2.jpg',
                'status' => 'incompleted',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'employee_id' => 3,
                'date' => Carbon::now()->subDay()->toDateString(),
                'start_time' => Carbon::now()->subDay()->setTime(8, 0, 0),
                'end_time' => Carbon::now()->subDay()->setTime(17, 0, 0),
                'photo' => null,
                'status' => 'completed',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

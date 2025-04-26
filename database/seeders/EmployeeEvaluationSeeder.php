<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class EmployeeEvaluationSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('employee_evaluations')->insert([
            [
                'employee_id' => 1,
                'evaluation_date' => Carbon::now()->subMonths(1)->toDateString(),
                'information' => 'Performa sangat baik dan konsisten dalam menyelesaikan tugas.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'employee_id' => 2,
                'evaluation_date' => Carbon::now()->subMonths(2)->toDateString(),
                'information' => 'Perlu meningkatkan kemampuan komunikasi dan kerja tim.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'employee_id' => 3,
                'evaluation_date' => Carbon::now()->toDateString(),
                'information' => 'Baru bergabung, penilaian awal cukup baik.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

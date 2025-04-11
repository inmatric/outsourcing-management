<?php


namespace Database\Seeders;


use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WorkReportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('work_report')->insert([
            [
                'employee_id' => 1,
                'date' => now()->subDays(2),
                'work_description' => 'Performed routine maintenance on lab equipment.',
                'problem_found' => 'Fan was not working properly.',
                'action' => 'Replaced fan unit.',
                'image' => 'images/report/fan_fix.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'employee_id' => 2,
                'date' => now()->subDays(1),
                'work_description' => 'Checked electrical wiring.',
                'problem_found' => 'Loose cable connection.',
                'action' => 'Tightened and secured connections.',
                'image' => 'images/report/wiring_check.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'employee_id' => 3,
                'date' => now(),
                'work_description' => 'Tested projector in meeting room.',
                'problem_found' => 'Projector not powering on.',
                'action' => 'Replaced power adapter.',
                'image' => 'images/report/projector_repair.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

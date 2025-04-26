<?php


namespace Database\Seeders;


use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WorkEquipmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('work_equipment')->insert([
            [
                'employee_id' => '1',
                'position' => 'Technician',
                'location' => 'Lab A',
                'equipment' => 'Computer Set',
                'condition' => 'fair',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'employee_id' => '2',
                'position' => 'Supervisor',
                'location' => 'Lab B',
                'equipment' => 'Air Conditioner',
                'condition' => 'good',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'employee_id' => '3',
                'position' => 'Maintenance Staff',
                'location' => 'Server Room',
                'equipment' => 'UPS Battery',
                'condition' => 'damaged',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

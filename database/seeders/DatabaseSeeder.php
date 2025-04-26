<?php

namespace Database\Seeders;


// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(UserSeeder::class); 
        $this->call(EmployeeSeeder::class);       
        $this->call(CooperationSeeder::class);
        $this->call(LocationSeeder::class);   
        $this->call(LocationTypeSeeder::class);
        $this->call(WorkSeeder::class);
        $this->call(LocationDivisionSeeder::class);
        $this->call(ProcessingWDSeeder::class);
        $this->call(EmployeeContractSeeder::class);
        $this->call(ItemFoundSeeder::class);
        $this->call(LostItemSeeder::class);
        $this->call(WorkEquipmentSeeder::class);
        $this->call(WorkReportSeeder::class);       
        $this->call(WorktoolsSeeder::class);       
        $this->call(OffenceSeeder::class);       
        $this->call(AttendanceSeeder::class);       
        $this->call(PermissionRequestSeeder::class);       
        $this->call(FundSeeder::class);       
        $this->call(EmployeeEvaluationSeeder::class);       
        $this->call(ComplaintSeeder::class);
        $this->call(ComplaintResolutionSeeder::class);            
    }
}

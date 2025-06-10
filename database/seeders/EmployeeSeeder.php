<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmployeeSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('employees')->insert([
            [
                'id' => 1,
                'user_id' => 1,
                'name' => 'Admin One',
                'address' => 'Jl. Mawar No. 1',
                'age' => '30',
                'phone_number' => '081234567891',
                'skill' => 'React, Node.js',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'user_id' => 2,
                'name' => 'HRD Two',
                'address' => 'Jl. Melati No. 2',
                'age' => '28',
                'phone_number' => '081234567892',
                'skill' => 'React, Node.js',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 3,
                'user_id' => 3,
                'name' => 'User Three',
                'address' => 'Jl. Anggrek No. 3',
                'age' => '25',
                'phone_number' => '081234567893',
                'skill' => 'React, Node.js',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

<?php


namespace Database\Seeders;


use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LostItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('lost_item')->insert([
            [
                'lost_name' => 'Michael Johnson',
                'item_name' => 'Notebook',
                'lost_location' => 'Cafeteria',
                'lost_date' => now()->subDays(5),
                'photo' => 'images/lost/notebook.jpg',
                'status' => 'not taken',
                'description' => 'Blue notebook with handwritten notes.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'lost_name' => 'Lina Putri',
                'item_name' => 'Calculator',
                'lost_location' => 'Classroom B2',
                'lost_date' => now()->subDays(2),
                'photo' => 'images/lost/calculator.jpg',
                'status' => 'already taken',
                'description' => 'Casio scientific calculator.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'lost_name' => 'Ahmad Rafi',
                'item_name' => 'Headphones',
                'lost_location' => 'Bus Stop',
                'lost_date' => now()->subDay(),
                'photo' => 'images/lost/headphones.jpg',
                'status' => 'not taken',
                'description' => 'Black wireless headphones, no brand.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

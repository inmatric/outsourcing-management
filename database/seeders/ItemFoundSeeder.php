<?php


namespace Database\Seeders;


use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ItemFoundSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('item_found')->insert([
            [
                'find_name' => 'John Doe',
                'item_name' => 'Black Wallet',
                'found_location' => 'Library',
                'found_date' => now()->subDays(3),
                'telephone' => '081234567891',
                'photo' => 'images/found/wallet.jpg',
                'status' => 'not taken',
                'description' => 'Black leather wallet with ID and some cash.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'find_name' => 'Anna Smith',
                'item_name' => 'Water Bottle',
                'found_location' => 'Gym Hall',
                'found_date' => now()->subDays(2),
                'telephone' => '081298765432',
                'photo' => 'images/found/bottle.jpg',
                'status' => 'already taken',
                'description' => 'Blue Thermos water bottle.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'find_name' => 'Rian Prasetyo',
                'item_name' => 'USB Flash Drive',
                'found_location' => 'Computer Lab',
                'found_date' => now()->subDay(),
                'telephone' => '082112345678',
                'photo' => 'images/found/usb.jpg',
                'status' => 'not taken',
                'description' => '16GB flash drive labeled "Project".',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

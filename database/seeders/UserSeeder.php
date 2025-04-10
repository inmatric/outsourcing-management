<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
            'role_name' => 'admin',
        ]);
        User::create([
            'email' => 'hrd@example.com',
            'password' => Hash::make('password'),
            'role_name' => 'hrd',
        ]);
        User::create([
            'email' => 'user@example.com',
            'password' => Hash::make('password'),
            'role_name' => 'user',
        ]);
    }
}

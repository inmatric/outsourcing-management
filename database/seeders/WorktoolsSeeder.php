<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WorktoolsSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('worktools')->insert([
            [
                'name' => 'Obeng',
                'description' => 'Alat untuk mengencangkan atau mengendurkan sekrup.',
                'purpose' => 'Digunakan dalam perakitan dan perbaikan perangkat elektronik.',
                'image' => 'images/worktools/obeng.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Tang Kombinasi',
                'description' => 'Alat multifungsi untuk memotong dan mencengkeram benda.',
                'purpose' => 'Digunakan dalam pekerjaan listrik dan mekanik.',
                'image' => 'images/worktools/tang.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Bor Listrik',
                'description' => 'Alat untuk membuat lubang pada permukaan kayu, besi, atau beton.',
                'purpose' => 'Digunakan dalam instalasi dan konstruksi bangunan.',
                'image' => 'images/worktools/bor.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

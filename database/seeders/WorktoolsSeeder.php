<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WorkToolsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('worktools')->insert([
            [
                'name' => 'Obeng', // Ganti 'nama' menjadi 'name'
                'description' => 'Alat untuk mengencangkan atau mengendurkan sekrup.', // Ganti 'sop' menjadi 'description'
                'purpose' => 'Digunakan dalam perakitan dan perbaikan perangkat elektronik.', // Ganti 'tujuan' menjadi 'purpose'
                'image' => 'images/worktools/obeng.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Tang Kombinasi', // Ganti 'nama' menjadi 'name'
                'description' => 'Alat multifungsi untuk memotong dan mencengkeram benda.', // Ganti 'sop' menjadi 'description'
                'purpose' => 'Digunakan dalam pekerjaan listrik dan mekanik.', // Ganti 'tujuan' menjadi 'purpose'
                'image' => 'images/worktools/tang.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Bor Listrik', // Ganti 'nama' menjadi 'name'
                'description' => 'Alat untuk membuat lubang pada permukaan kayu, besi, atau beton.', // Ganti 'sop' menjadi 'description'
                'purpose' => 'Digunakan dalam instalasi dan konstruksi bangunan.', // Ganti 'tujuan' menjadi 'purpose'
                'image' => 'images/worktools/bor.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

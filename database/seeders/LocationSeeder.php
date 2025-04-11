<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;


class LocationSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('locations')->insert([
            [
                'id' => 1,
                'cooperation_id' => 1,
                'location' => 'Gedung A - Lantai 1',
                'location_type' => 'Ruang Kerja',
                'information' => 'Ruang kerja utama untuk staf administrasi',
                'status' => 'aktif',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'cooperation_id' => 1,
                'location' => 'Gudang Utama',
                'location_type' => 'Gudang',
                'information' => 'Penyimpanan barang inventaris kantor',
                'status' => 'aktif',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 3,
                'cooperation_id' => 1,
                'location' => 'Gudang Utama',
                'location_type' => 'Gudang',
                'information' => 'Penyimpanan barang inventaris kantor',
                'status' => 'aktif',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 4,
                'cooperation_id' => 2,
                'location' => 'Kantor Cabang Bandung',
                'location_type' => 'Kantor Cabang',
                'information' => 'Kantor operasional di wilayah Bandung',
                'status' => 'nonaktif',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}

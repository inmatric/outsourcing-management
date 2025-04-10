<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LocationTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = Carbon::now();

        DB::table('location_type')->insert([
            ['id' => 1, 'location_type' => 'Ruang Kelas', 'description' => 'Digunakan untuk kegiatan perkuliahan harian.', 'created_at' => null, 'updated_at' => null],
            ['id' => 3, 'location_type' => 'Perpustakaan', 'description' => 'Pusat literatur dan referensi akademik.', 'created_at' => null, 'updated_at' => null],
            ['id' => 4, 'location_type' => 'Ruang Dosen', 'description' => 'Tempat kerja dan diskusi bagi dosen.', 'created_at' => null, 'updated_at' => null],
            ['id' => 5, 'location_type' => 'Ruang TU', 'description' => 'Ruang Tata Usaha untuk administrasi akademik.', 'created_at' => null, 'updated_at' => null],
            ['id' => 6, 'location_type' => 'Auditorium', 'description' => 'Tempat seminar, sidang skripsi, dan acara kampus lainnya.', 'created_at' => null, 'updated_at' => null],
            ['id' => 7, 'location_type' => 'Ruang Rapat', 'description' => 'Digunakan untuk rapat internal fakultas atau jurusan.', 'created_at' => null, 'updated_at' => null],
            ['id' => 8, 'location_type' => 'Kantin', 'description' => 'Area makan bagi mahasiswa dan staf kampus.', 'created_at' => null, 'updated_at' => null],
            ['id' => 9, 'location_type' => 'Masjid', 'description' => 'Tempat ibadah bagi civitas kampus.', 'created_at' => null, 'updated_at' => null],
            ['id' => 10, 'location_type' => 'Ruang UKM', 'description' => 'Tempat aktivitas Unit Kegiatan Mahasiswa.', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 11, 'location_type' => 'Ruang Kelas', 'description' => 'Digunakan untuk kegiatan belajar mengajar', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 12, 'location_type' => 'Ruang Lab', 'description' => 'Laboratorium untuk praktikum atau eksperimen', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 13, 'location_type' => 'Kantor', 'description' => 'Tempat kegiatan administrasi dan manajemen', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 14, 'location_type' => 'Gudang', 'description' => 'Penyimpanan barang dan logistik', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 15, 'location_type' => 'Administrasi', 'description' => 'Ruang bagian pengelolaan administrasi', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 16, 'location_type' => 'Ruang Khusus', 'description' => 'Ruang dengan akses terbatas dan keperluan tertentu', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 17, 'location_type' => 'Ruang Rawat', 'description' => 'Digunakan untuk perawatan pasien di fasilitas kesehatan', 'created_at' => $now, 'updated_at' => $now],
        ]);
    }
}

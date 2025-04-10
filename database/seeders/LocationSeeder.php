<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class LocationSeeder extends Seeder
{
    public function run(): void
    {
        $now = Carbon::now();

        DB::table('locations')->insert([
            ['id' => 1, 'company' => 'Politeknik Negeri Cilacap', 'location' => 'Lantai 2 Gedung A', 'location_type' => 'Ruang Kelas', 'location_code' => 'P.2', 'information' => 'Dekat tangga utama', 'status' => 'active', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 2, 'company' => 'Politeknik Negeri Cilacap', 'location' => 'Lantai 3 Gedung A', 'location_type' => 'Ruang Kelas', 'location_code' => 'P.3', 'information' => 'Ruang multimedia', 'status' => 'active', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 3, 'company' => 'Politeknik Negeri Cilacap', 'location' => 'Gedung B', 'location_type' => 'Ruang Lab', 'location_code' => 'P.B', 'information' => 'Lab komputer & jaringan', 'status' => 'active', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 4, 'company' => 'PT Sukses Bersama', 'location' => 'Kantor Pusat', 'location_type' => 'Kantor', 'location_code' => 'SB.1', 'information' => 'Lantai 1 sampai 5', 'status' => 'active', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 5, 'company' => 'PT Sukses Bersama', 'location' => 'Gudang Utama', 'location_type' => 'Gudang', 'location_code' => 'SB.2', 'information' => 'Menyimpan bahan baku', 'status' => 'active', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 6, 'company' => 'PT Aman Sentosa', 'location' => 'Lantai Dasar', 'location_type' => 'Kantor', 'location_code' => 'AS.1', 'information' => 'Layanan pelanggan', 'status' => 'active', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 7, 'company' => 'PT Aman Sentosa', 'location' => 'Gudang Selatan', 'location_type' => 'Gudang', 'location_code' => 'AS.2', 'information' => 'Pendingin produk', 'status' => 'active', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 8, 'company' => 'SMK Negeri 1', 'location' => 'Lantai 1 Gedung Barat', 'location_type' => 'Ruang Kelas', 'location_code' => 'SMK.1', 'information' => 'Kelas 10 dan 11', 'status' => 'active', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 9, 'company' => 'SMK Negeri 1', 'location' => 'Lantai 2 Gedung Timur', 'location_type' => 'Ruang Lab', 'location_code' => 'SMK.2', 'information' => 'Lab fisika dan kimia', 'status' => 'active', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 10, 'company' => 'Universitas Teknologi', 'location' => 'Gedung Rektorat', 'location_type' => 'Administrasi', 'location_code' => 'UT.1', 'information' => 'Pusat administrasi', 'status' => 'active', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 11, 'company' => 'Universitas Teknologi', 'location' => 'Gedung Kuliah Umum', 'location_type' => 'Ruang Kelas', 'location_code' => 'UT.2', 'information' => 'Ruang besar 200 kursi', 'status' => 'active', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 12, 'company' => 'CV Sejahtera', 'location' => 'Gudang A', 'location_type' => 'Gudang', 'location_code' => 'CV.1', 'information' => 'Untuk barang ekspor', 'status' => 'active', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 13, 'company' => 'CV Sejahtera', 'location' => 'Kantor Produksi', 'location_type' => 'Kantor', 'location_code' => 'CV.2', 'information' => 'Manufaktur ringan', 'status' => 'active', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 14, 'company' => 'PT Bangun Mandiri', 'location' => 'Gedung Baru', 'location_type' => 'Ruang Lab', 'location_code' => 'BM.1', 'information' => 'Lab teknik sipil', 'status' => 'active', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 15, 'company' => 'PT Bangun Mandiri', 'location' => 'Kantor Utama', 'location_type' => 'Kantor', 'location_code' => 'BM.2', 'information' => 'Staff manajemen', 'status' => 'active', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 16, 'company' => 'PT Digital Inovasi', 'location' => 'Server Room', 'location_type' => 'Ruang Khusus', 'location_code' => 'DI.1', 'information' => 'Pendingin 24 jam', 'status' => 'active', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 17, 'company' => 'PT Digital Inovasi', 'location' => 'Meeting Room', 'location_type' => 'Ruang Rapat', 'location_code' => 'DI.2', 'information' => 'Presentasi internal', 'status' => 'active', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 18, 'company' => 'Sekolah Harapan', 'location' => 'Gedung A', 'location_type' => 'Ruang Kelas', 'location_code' => 'SH.1', 'information' => 'Kelas 1 sampai 6', 'status' => 'active', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 19, 'company' => 'Sekolah Harapan', 'location' => 'Gedung B', 'location_type' => 'Ruang Kelas', 'location_code' => 'SH.2', 'information' => 'Kelas 7 sampai 9', 'status' => 'active', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 20, 'company' => 'Puskesmas Utama', 'location' => 'Lantai 2', 'location_type' => 'Ruang Rawat', 'location_code' => 'PU.1', 'information' => 'Rawat inap anak', 'status' => 'active', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 21, 'company' => 'SMK Negeri 1', 'location' => 'Lantai 5 IPS', 'location_type' => 'Ruang Kelas,Masjid,Gudang', 'location_code' => 'S578', 'information' => 'Tidak termasuk toilet', 'status' => 'active', 'created_at' => '2025-04-10 02:37:15', 'updated_at' => '2025-04-10 02:37:15'],
        ]);
    }
}

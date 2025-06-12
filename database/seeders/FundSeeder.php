<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;

class FundSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('funds')->insert([
            [
                'id' => 1,
                'cooperation_id' => 1,
                'date' => Carbon::parse('2024-01-15'),
                'fund_received' => 1500000.00,
                'payment' => 'Transfer Bank',
                'receipt' => 'RCPT-001',
                'description' => 'Dana operasional bulanan',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'cooperation_id' => 2,
                'date' => Carbon::parse('2024-02-01'),
                'fund_received' => 2500000.00,
                'payment' => 'Kartu Kredit',
                'receipt' => 'RCPT-002',
                'description' => 'Pembayaran proyek A',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 3,
                'cooperation_id' => 1,
                'date' => Carbon::parse('2024-03-10'),
                'fund_received' => 1800000.00,
                'payment' => 'E-Wallet',
                'receipt' => 'RCPT-003',
                'description' => 'Pembelian alat kerja',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ComplaintSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $complaints = [
            [
                'visitor_name' => 'John Doe',
                'customer_phone' => '081234567890',
                'description' => 'The product I received was damaged and not as described in the website.',
                'proof_image' => 'complaints/john_doe_1.jpg',
                'complaint_resolution_id' => 1, // Assuming 1 = Pending
                'location_id' => 1,
                'employee_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'visitor_name' => 'Jane Smith',
                'customer_phone' => '082345678901',
                'description' => 'Poor customer service at the store location. The staff was rude and unhelpful.',
                'proof_image' => 'complaints/jane_smith_1.jpg',
                'complaint_resolution_id' => 2, // Assuming 2 = In Progress
                'location_id' => 2,
                'employee_id' => 2,
                'created_at' => Carbon::now()->subDays(2),
                'updated_at' => Carbon::now()->subDays(1)
            ],
            [
                'visitor_name' => 'Robert Johnson',
                'customer_phone' => '083456789012',
                'description' => 'The food I ordered was cold when it arrived, and some items were missing.',
                'proof_image' => null, // No proof image provided
                'complaint_resolution_id' => 3, // Assuming 3 = Resolved
                'location_id' => 3,
                'employee_id' => 3,
                'created_at' => Carbon::now()->subWeek(),
                'updated_at' => Carbon::now()->subDays(3)
            ],
            [
                'visitor_name' => 'Sarah Williams',
                'customer_phone' => '084567890123',
                'description' => 'The website keeps crashing when I try to complete my payment. I lost my cart items three times!',
                'proof_image' => 'complaints/sarah_williams_1.png',
                'complaint_resolution_id' => 1, // Assuming 1 = Pending
                'location_id' => 4,
                'employee_id' => 4,
                'created_at' => Carbon::now()->subHours(5),
                'updated_at' => Carbon::now()->subHour()
            ]
        ];

        DB::table('complaints')->insert($complaints);
    }
}

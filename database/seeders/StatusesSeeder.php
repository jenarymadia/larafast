<?php

namespace Database\Seeders;

use App\Models\Status;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StatusesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $statuses = [
            // Lead stages
            ['module' => 'lead', 'key' => 'New', 'value' => 1],
            ['module' => 'lead', 'key' => 'Qualified', 'value' => 2],
            ['module' => 'lead', 'key' => 'Unqualified', 'value' => 3],

            // Opportunity stages
            ['module' => 'opportunity', 'key' => 'New', 'value' => 1],
            ['module' => 'opportunity', 'key' => 'In Progress', 'value' => 2],
            ['module' => 'opportunity', 'key' => 'Won', 'value' => 3],
            ['module' => 'opportunity', 'key' => 'Lost', 'value' => 4],

            // Job/Work Order stages
            ['module' => 'jobs', 'key' => 'Scheduled', 'value' => 1],
            ['module' => 'jobs', 'key' => 'In Progress', 'value' => 2],
            ['module' => 'jobs', 'key' => 'Completed', 'value' => 3],
            ['module' => 'jobs', 'key' => 'Pending', 'value' => 4],
            ['module' => 'jobs', 'key' => 'Cancelled', 'value' => 5],

            // Invoice stages
            ['module' => 'invoice', 'key' => 'Draft', 'value' => 1],
            ['module' => 'invoice', 'key' => 'Sent', 'value' => 2],
            ['module' => 'invoice', 'key' => 'Paid', 'value' => 3],
            ['module' => 'invoice', 'key' => 'Overdue', 'value' => 4],
        ];

        Status::insert($statuses);
    }
}

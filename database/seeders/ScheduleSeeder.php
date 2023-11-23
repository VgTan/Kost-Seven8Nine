<?php

namespace Database\Seeders;

use App\Models\Schedule;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schedule::create([
            'branchroom_id' => '1',
            'date' => '-',
            'day' => 'mon',
            'time' => '9.00 - 9.30',
            'status' => 'ready'
        ]);

        Schedule::create([
            'branchroom_id' => '1',
            'date' => '-',
            'day' => 'mon',
            'time' => '9.30 - 10.30',
            'status' => 'ready'
        ]);

        Schedule::create([
            'branchroom_id' => '1',
            'date' => '-',
            'day' => 'mon',
            'time' => '10.30 - 11.00',
            'status' => 'ready'
        ]);

        Schedule::create([
            'branchroom_id' => '1',
            'date' => '-',
            'day' => 'mon',
            'time' => '11.00 - 11.30',
            'status' => 'ready'
        ]);

        Schedule::create([
            'branchroom_id' => '1',
            'date' => '-',
            'day' => 'tues',
            'time' => '11.00 - 11.30',
            'status' => 'ready'
        ]);
    }
}

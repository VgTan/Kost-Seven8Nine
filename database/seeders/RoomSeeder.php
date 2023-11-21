<?php

namespace Database\Seeders;

use App\Models\Room;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Room::create([
            'name' => 'Piano Room',
        ]);

        Room::create([
            'name' => 'Vocal Room',
        ]);

        Room::create([
            'name' => 'Drum Room',
        ]);

        Room::create([
            'name' => 'Piano Room 1',
        ]);

        Room::create([
            'name' => 'Piano Room 2',
        ]);
    }
}

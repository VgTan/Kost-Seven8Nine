<?php

namespace Database\Seeders;

use App\Models\BranchRoom;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BranchRoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        BranchRoom::create([
            'branch_id' => '1',
            'branch_name' => 'Mall Bassura',
            'room_id' => '1',
            'room_type' => 'Piano Room',
            'room_size' => ' ',
            'room_equipment' => ' ',
            'room_desc' => ' ',
            'img' => 'inside2.jpg'
        ]);

        BranchRoom::create([
            'branch_id' => '1',
            'branch_name' => 'Mall Bassura',
            'room_id' => '2',
            'room_type' => 'Vocal Room',
            'room_size' => ' ',
            'room_equipment' => ' ',
            'room_desc' => ' ',
            'img' => 'inside1.jpg'
        ]);

        BranchRoom::create([
            'branch_id' => '2',
            'branch_name' => 'Aeon JGC',
            'room_id' => '1',
            'room_type' => 'Piano Room',
            'room_size' => ' ',
            'room_equipment' => ' ',
            'room_desc' => ' ',
            'img' => ' '
        ]);

        BranchRoom::create([
            'branch_id' => '2',
            'branch_name' => 'Aeon JGC',
            'room_id' => '3',
            'room_type' => 'Drum Room',
            'room_size' => ' ',
            'room_equipment' => ' ',
            'room_desc' => ' ',
            'img' => ' '
        ]);

        BranchRoom::create([
            'branch_id' => '3',
            'branch_name' => 'Maxxbox',
            'room_id' => '4',
            'room_type' => 'Piano Room 1',
            'room_size' => ' ',
            'room_equipment' => ' ',
            'room_desc' => ' ',
            'img' => ' '
        ]);

        BranchRoom::create([
            'branch_id' => '3',
            'branch_name' => 'Maxxbox',
            'room_id' => '5',
            'room_type' => 'Piano Room 2',
            'room_size' => ' ',
            'room_equipment' => ' ',
            'room_desc' => ' ',
            'img' => ' '
        ]);

        BranchRoom::create([
            'branch_id' => '3',
            'branch_name' => 'Maxxbox',
            'room_id' => '2',
            'room_type' => 'Vocal Room',
            'room_size' => ' ',
            'room_equipment' => ' ',
            'room_desc' => ' ',
            'img' => ' '
        ]);

        BranchRoom::create([
            'branch_id' => '3',
            'branch_name' => 'Maxxbox',
            'room_id' => '3',
            'room_type' => 'Drum Room',
            'room_size' => ' ',
            'room_equipment' => ' ',
            'room_desc' => ' ',
            'img' => ' '
        ]);
    }
}

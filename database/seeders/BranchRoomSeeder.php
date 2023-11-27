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
            'branch_name' => 'Mall @Bassura City Jakarta',
            'room_id' => '1',
            'room_type' => 'Piano Room',
            'room_size' => '2,5 x 1,5 (m²)',
            'room_equipment' => 'Grand Piano',
            'room_desc' => 'Immerse yourself in the enchanting world of music in our room featuring a grand piano, offering the perfect environment for learning and mastering the art of playing the piano.',
            'img' => 'pianoroom-basura.jpg'
        ]);

        BranchRoom::create([
            'branch_id' => '1',
            'branch_name' => 'Mall @Bassura City Jakarta',
            'room_id' => '2',
            'room_type' => 'Vocal Room',
            'room_size' => '2,5 x 1,5 (m²)',
            'room_equipment' => 'Keyboard, Speakers, Microphone',
            'room_desc' => 'Step into our dedicated practice room, complete with a microphone and keyboard, and elevate your vocal and musical prowess in a harmonious space designed for optimal learning and creativity.',
            'img' => 'vocalroom.jpg'
        ]);

        BranchRoom::create([
            'branch_id' => '2',
            'branch_name' => 'Aeon JGC',
            'room_id' => '1',
            'room_type' => 'Piano Room',
            'room_size' => '2,5 x 1,5 (m²)',
            'room_equipment' => 'Grand Piano',
            'room_desc' => 'Immerse yourself in the enchanting world of music in our room featuring a grand piano, offering the perfect environment for learning and mastering the art of playing the piano.',
            'img' => 'pianoroom-aeon.jpg'
        ]);

        BranchRoom::create([
            'branch_id' => '2',
            'branch_name' => 'Aeon JGC',
            'room_id' => '3',
            'room_type' => 'Vocal Room',
            'room_size' => '2,5 x 1,5 (m²)',
            'room_equipment' => 'Keyboard, Speakers, Microphone',
            'room_desc' => 'Step into our dedicated practice room, complete with a microphone and keyboard, and elevate your vocal and musical prowess in a harmonious space designed for optimal learning and creativity.',
            'img' => 'vocalroom.jpg'
        ]);

        BranchRoom::create([
            'branch_id' => '3',
            'branch_name' => 'Maxxbox',
            'room_id' => '4',
            'room_type' => 'Piano Room 1',
            'room_size' => '2,5 x 1,5 (m²)',
            'room_equipment' => 'Grand Piano',
            'room_desc' => 'Immerse yourself in the enchanting world of music in our room featuring a grand piano, offering the perfect environment for learning and mastering the art of playing the piano.',
            'img' => 'pianoroom-maxx.jpg'
        ]);

        BranchRoom::create([
            'branch_id' => '3',
            'branch_name' => 'Maxxbox',
            'room_id' => '5',
            'room_type' => 'Piano Room 2',
            'room_size' => '2,5 x 1,5 (m²)',
            'room_equipment' => 'Grand Piano',
            'room_desc' => 'Indulge in the melodic resonance of our exclusive practice room, featuring a grand piano, where every keystroke invites you to refine your musical artistry in an environment crafted for both concentration and inspiration.',
            'img' => 'pianoroom1-maxx.jpg'
        ]);

        BranchRoom::create([
            'branch_id' => '3',
            'branch_name' => 'Maxxbox',
            'room_id' => '2',
            'room_type' => 'Vocal Room',
            'room_size' => '2,5 x 1,5 (m²)',
            'room_equipment' => 'Keyboard, Speakers, Microphone',
            'room_desc' => 'Immerse yourself in the enchanting world of music in our room featuring a grand piano, offering the perfect environment for learning and mastering the art of playing the piano.',
            'img' => 'vocalroom-maxx.jpg'
        ]);

        BranchRoom::create([
            'branch_id' => '3',
            'branch_name' => 'Maxxbox',
            'room_id' => '3',
            'room_type' => 'Drum Room',
            'room_size' => '2,5 x 1,5 (m²)',
            'room_equipment' => 'Drum Kit',
            'room_desc' => 'Unleash your rhythmic potential in our dynamic drum practice room, equipped with a professional drum kit that invites drummers of all skill levels to explore, experiment, and perfect their beats.',
            'img' => 'drumroom-maxx.jpg'
        ]);
    }
}

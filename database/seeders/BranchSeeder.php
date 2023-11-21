<?php

namespace Database\Seeders;

use App\Models\Branch;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BranchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Branch::create([
            'name' => 'Mall Bassura',
            'location' => '-',
            'site' => 'bassura',
            'img' => 'logo.jpg'
        ]);

        Branch::create([
            'name' => 'Aeon JGC',
            'location' => '-',
            'site' => 'aeon',
            'img' => 'logo.jpg'
        ]);

        Branch::create([
            'name' => 'Maxxbox',
            'location' => '-',
            'site' => 'maxxbox',
            'img' => 'logo.jpg'
        ]);
    }
}

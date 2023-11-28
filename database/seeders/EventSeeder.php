<?php

namespace Database\Seeders;

use App\Models\Event;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{
    public function run(): void
    {
        Event::create([
            'name' => 'Rhapsodie Indonesia Piano Competition (RIPC) Vol 2',
            'location' => 'Ice BSD',
            'desc' => 'Visit Our Booth and Get Special Offer',
            'date'=> '18 s/d 19 November 2023',
            'img' => 'eventcompe.jpg'
        ]);
    }
}

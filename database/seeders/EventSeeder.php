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
            'desc' => 'Rhapsodie.co buka booth di Ice BSD? Jangan Lupa Mampir ke Booth Kita! Banyak Promo Menanti',
            'date'=> '18 s/d 19 November 2023',
            'img' => 'eventcompe.jpg',
            'link' => 'https://www.instagram.com/p/CzvSHAuPVzL/'
        ]);

        Event::create([
            'name' => 'Daftar Les Musik Bisa Dapet Timezone?',
            'location' => 'Our Location',
            'desc' => 'Daftar les musik sekarang dan kalian bakal dapetin voucher bermain dari Timezone',
            'date'=> 'Persediaan Terbatas',
            'img' => 'eventtimezone.jpg',
            'link' => 'https://www.instagram.com/p/C0LVz-KKbFh/'
        ]);

        Event::create([
            'name' => 'Daftar Les Musik Bisa Pakai Ruang Latihan Sepuasnya?',
            'location' => 'Our Location',
            'desc' => 'Hanya di Rhapsodie.co Music Space! Cukup tambah Rp 100.000 bisa pakai ruang latihan sepuasnya!',
            'date'=> '10 s/d 31 November 2023',
            'img' => 'promoseratus.jpg',
            'link' => 'https://www.instagram.com/p/CzfPx3BLERI/'
        ]);
    }
}

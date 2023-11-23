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
            'location' => 'Jl. Jend. Basuki Rachmat No.1A, Cipinang Besar Sel., Kecamatan Jatinegara, Kota Jakarta Timur, Daerah Khusus Ibukota Jakarta 13410',
            'site' => 'bassura',
            'img' => 'basura.jpg',
            'branch_desc' => 'Visit the music space at Mall Bassura, where aspiring musicians can immerse themselves in the world of melody.',
            'branch_equipment' => 'Grand Piano, Keyboard, Guitar, Violin',
            'location_map' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1983.1479863484483!2d106.87685548845329!3d-6.224650932042526!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f324a4f3d8ad%3A0x610648e929845480!2sMall%40Bassura!5e0!3m2!1sen!2sid!4v1700755631849!5m2!1sen!2sid'
        ]);

        Branch::create([
            'name' => 'Aeon Mall Jakarta Garden City',
            'location' => 'Jl. Jkt Garden City Boulevard No.1, RT.8/RW.6, Cakung Tim., Kec. Cakung, Kota Jakarta Timur, Daerah Khusus Ibukota Jakarta 13910',
            'site' => 'aeon',
            'img' => 'aeon.jpg',
            'branch_desc' => 'Visit the music space at Mall Bassura, where aspiring musicians can immerse themselves in the world of melody.',
            'branch_equipment' => 'Grand Piano, Keyboard, Guitar, Violin',
            'location_map' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.6901814285425!2d106.94965347461759!3d-6.172220460483689!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e698b02782a13cb%3A0x2c473319d7d1eef6!2sAEON%20MALL%20JGC%20-%20Jakarta%20Garden%20City!5e0!3m2!1sen!2sid!4v1700755537618!5m2!1sen!2sid'
        ]);

        Branch::create([
            'name' => 'MaxxBox Lippo Village',
            'location' => 'Lippo Village 1200, Jl. Jend. Sudirman No.1110, Bencongan, Kec. Klp. Dua, Kabupaten Tangerang, Banten 15810',
            'site' => 'maxxbox',
            'img' => 'lippo.jpg',
            'branch_desc' => 'Visit the music space at Mall Bassura, where aspiring musicians can immerse themselves in the world of melody.',
            'branch_equipment' => 'Grand Piano, Keyboard, Guitar, Violin, Drum Kit',
            'location_map' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.2628994588977!2d106.60169437630088!3d-6.229029744885006!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69fc1f463d2da7%3A0x50e69f92e6270e23!2sMaxxBox%20Lippo%20Village!5e0!3m2!1sen!2sid!4v1700755682413!5m2!1sen!2sid'
        ]);
    }
}

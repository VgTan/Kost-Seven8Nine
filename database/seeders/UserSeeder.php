<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'aaaa',
            'email' => 'alfonsus.vega@student.umn.ac.id',
            'password' => bcrypt('12345'),
            'token' => 100
        ]);
    }
}

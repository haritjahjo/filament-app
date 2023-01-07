<?php

namespace Database\Seeders;

use App\Models\Plant;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Plant::create(['alamat' => 'Jalan Mawar No. 1 RT.01 RW. 01', 'kota' => 'Surabaya']);
        Plant::create(['alamat' => 'Jalan Asri No. 6 RT.01 RW. 01', 'kota' => 'Sidoarjo']);
        Plant::create(['alamat' => 'Jalan Teratai No. 4 RT.01 RW. 01', 'kota' => 'Semarang']);
        Plant::create(['alamat' => 'Jalan Raya Kebayoran No. 7 RT.01 RW. 01', 'kota' => 'Kudus']);
    }
}

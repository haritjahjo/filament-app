<?php

namespace Database\Seeders;

use App\Models\Factory;
use App\Models\Pengusaha;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PengusahaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pengusaha::factory(10)->create();
    }
}

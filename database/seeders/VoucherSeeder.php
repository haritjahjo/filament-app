<?php

namespace Database\Seeders;

use App\Models\Voucher;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class VoucherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Voucher::create(['code' => 'CODE1', 'discount_percent' => 10]);
        Voucher::create(['code' => 'CODE2', 'discount_percent' => 20]);
        Voucher::create(['code' => 'CODE3', 'discount_percent' => 30, 'product_id' => 1]);
    }
}

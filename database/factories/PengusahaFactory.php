<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Factory>
 */
class PengusahaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'kd_kantor' => $this->faker->numerify(string:'######'),
            'nppbkc' => $this->faker->numerify(string:'##########'),
            'nm_perusahaan' => $this->faker->company(),
            'pemilik' => $this->faker->name(gender:null),
            'alm_pemilik' => $this->faker->address(),
            'kota' => $this->faker->city(),
            'tg_nppbkc' => $this->faker->date(format:'Y-m-d', max:'now'),
            'kuasa' => $this->faker->name(gender:null),
            'npwp' => $this->faker->numerify(string:'################'),
        ];
    }
}

<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class FasilitasKesehatanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $faker = \Faker\Factory::create('id_ID');

        return [
            'name'  =>  $this->faker->randomElement(['Rumah Sakit ', 'Puskesmas ', 'Klinik ']) . $faker->city(),
            'jenis_vaksin_id' => rand(1, 3),
            'quota' => rand(0, 500)
        ];
    }
}

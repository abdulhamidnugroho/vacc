<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class PendudukFactory extends Factory
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
            'NIK' => $faker->nik(),
            'name' => $faker->name(),
            'address' => $faker->address(),
            'dob' => Carbon::now()->subYears(rand(10, 62)),
            'phone' => $faker->phoneNumber(),
            'gender' => (bool) random_int(0, 1),
        ];
    }
}

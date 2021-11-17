<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JenisVaksinTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('jenis_vaksin')->insert([
            [
                'name' => 'Sinovac',
                'description' => '',
            ],
            [
                'name' => 'Astra Zenecca',
                'description' => '',
            ],
            [
                'name' => 'Moderna',
                'description' => '',
            ]
        ]);
    }
}

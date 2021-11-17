<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RegistrasiVaksinTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [];

        for ($i = 1; $i <= 100; $i++) {
            $temp = [
                'penduduk_id'               => $i,
                'fasilitas_kesehatan_id'    => random_int(1, 20),
                'jenis_vaksin_id'           => random_int(1, 3),
                'dosis_ke'                  => 1,
                'status'                    => random_int(1, 3),
            ];

            array_push($data, $temp);
        }

    	DB::table('registrasi_vaksin')->insert($data);
    }
}

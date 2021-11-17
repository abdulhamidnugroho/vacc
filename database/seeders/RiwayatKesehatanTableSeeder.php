<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RiwayatKesehatanTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [];

        // $random_number_array = range(1, 100, 3);
        // shuffle($random_number_array );
        // $random_number_array = array_slice($random_number_array, 0, 10);

        for ($i = 1; $i <= 100; $i++) {
            $temp = [
                'penduduk_id'               => $i,
                'hamil_menyusui'            => false,
                'jantung_koroner'           => false,
                'sjogren_syndrome'          => false,
                'rheumatoid_arthritis'      => false,
                'penerima_transfusi_darah'  => false
            ];

            // if ($i == $random_number_array[$i]) {
            //     $temp = [
            //         'penduduk_id'               => $i,
            //         'hamil_menyusui'            => (bool) random_int(0, 1),
            //         'jantung_koroner'           => (bool) random_int(0, 1),
            //         'sjogren_syndrome'          => (bool) random_int(0, 1),
            //         'rheumatoid_arthritis'      => (bool) random_int(0, 1),
            //         'penerima_transfusi_darah'  => (bool) random_int(0, 1)
            //     ];
            // } else {
            //     $temp = [
            //         'penduduk_id'               => $i,
            //         'hamil_menyusui'            => false,
            //         'jantung_koroner'           => false,
            //         'sjogren_syndrome'          => false,
            //         'rheumatoid_arthritis'      => false,
            //         'penerima_transfusi_darah'  => false
            //     ];
            // }

            array_push($data, $temp);
        }

    	DB::table('riwayat_kesehatan')->insert($data);
    }
}

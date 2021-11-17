<?php

namespace Database\Seeders;

use App\Models\FasilitasKesehatan;
use Illuminate\Database\Seeder;

class FasilitasKesehatanTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        FasilitasKesehatan::factory()
                            ->count(50)
                            ->create();
    }
}

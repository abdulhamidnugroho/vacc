<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRiwayatKesehatanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('riwayat_kesehatan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('penduduk_id')->constrained('penduduk');
            $table->boolean('hamil_menyusui')->default(false);
            $table->boolean('jantung_koroner')->default(false);
            $table->boolean('sjogren_syndrome')->default(false);
            $table->boolean('ginjal')->default(false);
            $table->boolean('rheumatoid_arthritis')->default(false);
            $table->boolean('penerima_transfusi_darah')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('riwayat_kesehatan');
    }
}

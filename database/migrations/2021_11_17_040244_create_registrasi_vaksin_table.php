<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegistrasiVaksinTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registrasi_vaksin', function (Blueprint $table) {
            $table->id();
            $table->foreignId('penduduk_id')->constrained('penduduk');
            $table->foreignId('fasilitas_kesehatan_id')->constrained('fasilitas_kesehatan');
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('jenis_vaksin_id')->constrained('jenis_vaksin');
            $table->tinyInteger('dosis_ke');
            $table->tinyInteger('status')->default(1); // 1: Terdaftar, 2: Tervaksin, 3: Batal
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
        Schema::dropIfExists('registrasi_vaksin');
    }
}

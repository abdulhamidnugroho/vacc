<?php

namespace App\Http\Controllers;

use App\Models\Penduduk;
use App\Models\RegistrasiVaksin;
use App\Models\RiwayatKesehatan;
use Illuminate\Http\Request;

class RegistrasiController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nik'   => 'required',
        ]);

        $citizen = Penduduk::firstWhere('nik', $request->nik);

        if (! $citizen) {
            return response()->json([
                'success'   => false,
                'data'      => 'Data Penduduk tidak ditemukan'
            ]);
        }

        $medical = RiwayatKesehatan::firstWhere('penduduk_id', $citizen->id);
        $medical = collect($medical)->except(['id', 'penduduk_id', 'created_at', 'updated_at']);

        if ($medical->contains(1)) {
            $true = [];

            foreach ($medical->toArray() as $key => $value) {
                if ($value == 1) {
                    $true[] = $key;
                }
            }

            $diseases =  str_replace('_', ' ', implode(', ', $true));

            return response()->json([
                'success'   => false,
                'data'      => 'Tidak dapat melakukan registrasi, pendaftar terdapat riwayat penyakit: ' . ucwords($diseases)
            ]);
        }

        $vaccine = RegistrasiVaksin::where('penduduk_id', $citizen->id)->get();

        if ($vaccine->isNotEmpty()) {
            return gettype($vaccine->pluck('dosis_ke'));
        }

        return 0;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

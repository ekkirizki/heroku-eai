<?php

namespace App\Http\Controllers;

use Exception;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class absen_controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('absen');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validasi = $request->validate([
            'Id_Karyawan' => 'required',
            'Jam_Masuk' => 'required',
            'Jam_Keluar' => 'required'
        ]);
        $url_absensi = "https://hrd-cydt.herokuapp.com/api/";

        $client_absensi = new Client([
            'base_uri' => $url_absensi
        ]);

        try {
            $create_absensi = $client_absensi->request('POST', 'absensi', [
                'form_params' => [
                    'id_karyawan' => $request->Id_Karyawan,
                    'jam_masuk' => $request->Jam_Masuk,
                    'jam_keluar' => $request->Jam_Keluar,
                    'tanggal_absensi' => $request->Tanggal
                ]
            ])->getBody();
            $pesan = json_decode($create_absensi);

            DB::table('absensi')->insert([
                'id_karyawan' => $request->Id_Karyawan,
                'jam_masuk' => $request->Jam_Masuk,
                'jam_keluar' => $request->Jam_Keluar,
                'tanggal_absensi' => $request->Tanggal
            ]);
            return redirect()->route('absen.index')->with('Berhasil', $pesan->message);
        } catch (Exception $e) {
            return redirect()->route('absen.index')->with('Gagal', $e->getMessage());
        }
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

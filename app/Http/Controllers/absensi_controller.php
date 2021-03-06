<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\DB;

class absensi_controller extends Controller
{
    //
    function index()
    {
        return view('absen');
    }
    function store(Request $request)
    {
        $validasi = $request->validate([
            'Id_Karyawan' => 'required',
            'Jam_Masuk' => 'required',
            'Jam_Keluar' => 'required'
        ]);

        dd($request);

        $url_absensi = "https://hrd-cydt.herokuapp.com/api/";

        $client_absensi = new Client([
            'base_uri' => $url_absensi
        ]);
        // $response_absensi = $client_absensi->request('GET', 'absensi')->getBody();
        // $hasil_absensi = json_decode($response_absensi);

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
}

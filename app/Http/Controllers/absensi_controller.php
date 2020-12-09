<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use GuzzleHttp\Client;

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
        ]);

        $url_absensi = "https://hrd-cydt.herokuapp.com/api/";

        $client_absensi = new Client([
            'base_uri' => $url_absensi
        ]);
        $response_absensi = $client_absensi->request('GET', 'absensi')->getBody();
        $hasil_absensi = json_decode($response_absensi);

        foreach ($hasil_absensi as $absen) {
            if (
                $absen->id_karyawan == $request->Id_Karyawan
                && $absen->tanggal_absensi == $request->Id_Karyawan
                && $absen->jam_masuk == null
            ) {
                try {
                    $post_absen = $client_absensi->request('POST', $url_absensi, [
                        'form_params' => [
                            'id_karyawan' => $request->Id_Karyawan,
                            'jam_masuk' => $request->Absen,
                            'nested_field' => [
                                'nested' => 'hello'
                            ]
                        ]
                    ]);
                    return redirect()->route('index')->with('Berhasil', "Berhasil ditambahkan");
                } catch (Exception $e) {
                    return redirect()->route('absen')->with('Gagal', $e->getMessage());
                }
            }
        }
    }
}

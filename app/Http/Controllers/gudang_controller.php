<?php

namespace App\Http\Controllers;

use Exception;
use GuzzleHttp\Client;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Translation\MessageCatalogue;

class gudang_controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // $pengiriman = DB::table('ambil_barang')->get();
        // return view('logistik', ['Pengiriman' => $Pengiriman]);
        // $pengiriman = pengiriman::all();
        return view('ambil_barang');
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
        $url_barang = "https://procurement-cydt.herokuapp.com/api/";

        $client_barang = new Client([
            'base_uri' => $url_barang
        ]);
        $response_barang = $client_barang->request('GET', 'barang')->getBody();
        $hasil_barang = json_decode($response_barang);

        $validasi = $request->validate([
            'Id_Karyawan' => 'required',
            'Id_Barang' => 'required',
            'Jumlah_Barang' => 'required'
        ]);

        try {
            $update_barang = $client_barang->request('PUT', 'barang/update-quantity/' . $request->Id_Barang, [
                'form_params' => [
                    'kuantitas' => $request->Hasil
                ]
            ])->getBody();
            $pesan = json_decode($update_barang);

            DB::table('ambil_barang')->insert([
                'id_karyawan' => $request->Id_Karyawan,
                'id_barang' => $request->Id_Barang,
                'jumlah_barang' => $request->Jumlah_Barang
            ]);
            return redirect()->route('ambil_barang.index')->with('Berhasil', $pesan->message);
        } catch (Exception $e) {
            return redirect()->route('ambil_barang.index')->with('Gagal', $e->getMessage());
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

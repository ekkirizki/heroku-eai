<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\pengiriman;
use Illuminate\Database\QueryException;


class pengiriman_controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $pengiriman = DB::table('pengiriman')->get();
        // return view('logistik', ['Pengiriman' => $Pengiriman]);
        // $pengiriman = pengiriman::all();
        return view('logistik', compact('pengiriman'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('insert');
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
        // $search = $request->get('term');
        // dd($request);
        $validasi = $request->validate([
            'Id_Pengiriman' => 'required',
            'Id_Karyawan' => 'required',
            'Id_Penjualan' => 'required',
            'Id_Jadwal' => 'required',
            'Id_Pelanggan' => 'required',
            'Status_Pelanggan' => 'required',
        ]);
        // try {
        //     pengiriman::create($request->all());
        //     return redirect()->route('index')->with('Berhasil', "Berhasil ditambahkan");
        // } catch (Exception $e) {
        //     return redirect()->route('tambah')->with('Gagal', $e->getMessage());
        // }

        try {
            DB::table('pengiriman')->insert([
                [
                    'id_pengiriman' => $request->get('Id_Pengiriman'),
                    'id_karyawan' => $request->get('Id_Karyawan'),
                    'id_penjualan' => $request->get('Id_Penjualan'),
                    'id_jadwal' => $request->get('Id_Jadwal'),
                    'id_pelanggan' => $request->get('Id_Pelanggan'),
                    'status_pelanggan' => $request->get('Status_Pelanggan')
                ]
            ]);
            return redirect()->route('index')->with('Berhasil', 'Berhasil ditambahkan');
        } catch (QueryException $e) {
            // dd($e->getMessage());
            return redirect()->route('tambah')->with('Gagal', $e->getMessage());
        }

        // $Pengiriman = DB::table('pengiriman')->get();
        // return view('/', [['Pengiriman' => $Pengiriman]]);

        // pengiriman::create($request->all());
        // return redirect()->route('pengiriman.index')->with('success', 'Berhasil ditambah.');
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
        // dd($id);
        // echo $id;
        $pengiriman = DB::table('pengiriman')->where('id_pengiriman', '=', $id)->get();
        return view('edit', ['pengiriman' => $pengiriman]);
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
        $validasi = $request->validate([
            'Id_Pengiriman' => 'required',
            'Id_Karyawan' => 'required',
            'Id_Penjualan' => 'required',
            'Id_Jadwal' => 'required',
            'Id_Pelanggan' => 'required',
            'Status_Pelanggan' => 'required',
        ]);
        // $id->update($request->all());
        // return redirect()->route('index')->with('Berhasil', 'Berhasil ditambahkan');       

        try {
            DB::table('pengiriman')->where('id_pengiriman', '=', $id)->update(
                [
                    'id_pengiriman' => $request->get('Id_Pengiriman'),
                    'id_karyawan' => $request->get('Id_Karyawan'),
                    'id_penjualan' => $request->get('Id_Penjualan'),
                    'id_jadwal' => $request->get('Id_Jadwal'),
                    'id_pelanggan' => $request->get('Id_Pelanggan'),
                    'status_pelanggan' => $request->get('Status_Pelanggan')
                ]
            );
            return redirect()->route('index')->with('Berhasil', 'Berhasil dirubah');
        } catch (QueryException $e) {
            // dd($e->getMessage());
            return redirect()->route('edit', $id)->with('Gagal', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function hapus($id)
    {
        //
        // dd($id);
        try {
            DB::table('pengiriman')->where('id_pengiriman', '=', $id)->delete();
            return redirect()->route('index')->with('Berhasil', 'Berhasil dihapus');
        } catch (QueryException $e) {
            return redirect()->route('index')->with('Gagal', $e->getMessage());
        }
    }
}

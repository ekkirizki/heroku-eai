<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\pengiriman;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;

class api_controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() //buat nampilin data - get
    {
        //
        $input = Request()->all(); //buat ngambil parameter -> setelah ? google/h?id=1

        if ($input == null) {
            $pengiriman = DB::table('pengiriman')->get();
            return $pengiriman;
        } else {
            // dd($input);
            $pengiriman = DB::table('pengiriman')->where($input)->get();
            return $pengiriman;
        }


        // return response()->json(pengiriman::all());
        // $pengiriman = DB::table('pengiriman')->get();
        // return $pengiriman;
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
        try {
            $insert = DB::table('pengiriman')->insert([
                [
                    'id_pengiriman' => $request->get('id_pengiriman'),
                    'id_karyawan' => $request->get('id_karyawan'),
                    'id_penjualan' => $request->get('id_penjualan'),
                    'id_jadwal' => $request->get('id_jadwal'),
                    'id_pelanggan' => $request->get('id_pelanggan'),
                    'status_pelanggan' => $request->get('status_pelanggan')
                ]
            ]);
            $res['message'] = "Berhasil";
            // $res['value'] = $request->all();
            return response($res);
        } catch (QueryException $e) {
            // dd($e->getMessage());
            $res = $e->getMessage();
            return response($res);
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
        try {
            $pengiriman = DB::table('pengiriman')->where('id_pengiriman', '=', $id)->get();
            return response()->json(
                $pengiriman,
                200
            );
        } catch (QueryException $e) {
            $res = $e->getMessage();
            return response($res);
        }
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
        try {
            $pengiriman = DB::table('pengiriman')->where('id_pengiriman', '=', $id)->get();
            return response()->json(
                $pengiriman,
                200
            );
        } catch (QueryException $e) {
            $res = $e->getMessage();
            return response($res);
        }
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
        try {
            $insert = DB::table('pengiriman')->where('id_pengiriman', '=', $id)->update(
                [
                    'id_pengiriman' => $request->get('id_pengiriman'),
                    'id_karyawan' => $request->get('id_karyawan'),
                    'id_penjualan' => $request->get('id_penjualan'),
                    'id_jadwal' => $request->get('id_jadwal'),
                    'id_pelanggan' => $request->get('id_pelanggan'),
                    'status_pelanggan' => $request->get('status_pelanggan')
                ]
            );
            $res['message'] = "Berhasil";
            // $res['value'] = $insert;
            return response($res);
        } catch (QueryException $e) {
            $res = $e->getMessage();
            return response($res);
        }
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
        try {
            $hapus = DB::table('pengiriman')->where('id_pengiriman', '=', $id)->delete();
            $res['message'] = "Berhasil";
            return response($res);
        } catch (QueryException $e) {
            $res = $e->getMessage();
            return response($res);
        }
    }
}

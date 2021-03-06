@extends('master')
@section('konten')

<?php 
use GuzzleHttp\Client;

$url_sales = "https://cydt-salesmarketing.herokuapp.com/api/";

$client_sales = new Client([
    'base_uri' => $url_sales
]);
$response_sales = $client_sales->request('GET','pelanggans')->getBody();
$hasil_sales = json_decode($response_sales);
// $data = ["id", "id_penjualan", "nama_pelanggan", "alamat_pelanggan"];
// dd($response);
// dd($hasil['data'][0]['id']);

// dd($hasil->data['0']->id);
// for ($i=0; $i < count($response["data"]); $i++) {
//     // $idpen[$i][$i][$i] = [$response["data"][$i][$data[0]],
//     // $response["data"][$i][$data[1]],
//     // $response["data"][$i][$data[2]],
//     // $response["data"][$i][$data[3]]];
//     $idpel[$i] = $response["data"][$i][$data[0]];
//     $idpen[$i] = $response["data"][$i][$data[1]];
//     $namapel[$i] = $response["data"][$i][$data[2]];
//     $alpel[$i] = $response["data"][$i][$data[3]];
// };
// echo $hasil['data'][0][$data[0]]; manggil hasil response
// $pelanggan = [
//     'id_penjualan' => $response->getBody(),
// ]

$url_hrd = "https://hrd-cydt.herokuapp.com/api/karyawan";

$client_hrd = new Client([
    'base_uri' => $url_hrd
]);
$response_hrd = $client_hrd->request('GET','karyawan')->getBody();
$hasil_hrd = json_decode($response_hrd);

?>
<div class="container" style="margin-top: 65px;">
    <h1 class="text-center">Tambah Pengiriman</h1>

    {{-- validasi --}}
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $errors)
            <li>
                {{ $errors }}
            </li>
            @endforeach
        </ul>
    </div>
    @endif

    @if ($message = Session::get('Gagal'))
    <div class="alert alert-danger text-center">
        <p>{{ $message }}</p>
    </div>
    @endif


    <form action="{{ route('store') }}" method="POST">
        @csrf
        <table class="table">
            <?php
                $Isi = DB::table('pengiriman')->count();                
                $ada = DB::table('pengiriman')->orderby('id_pengiriman', 'asc')->get();
                $i = 1;                  
                $Id = null;              
                $number = sprintf('%04d',$i);
                if ($Isi == null){
                    $Id = "KIR" . $number;                                    
                }                
                else{
                    $Ids = $ada->last()->id_pengiriman;                
                    $int = substr($Ids, -4);                  
                    // $str = substr($Ids, 0, 3); // 0, 3 -> menampilkan 3 huruf dari depan | 0, -4 , menghapus 4 huruf dari belakang
                    $str = "KIR";
                    $Id = $str . sprintf('%04d', $int+1);                    
                }
            ?>
            <tbody>
                <tr>
                    <td scope="row" style="width: 15%;">
                        <label for="Id_Pengiriman" class="col-sm-1-12 col-form-label">Id Pengiriman</label>
                    </td>
                    <td><input type="text" name="Id_Pengiriman" class="form-control" id="Id_Pengiriman"
                            value="{{ $Id }}" readonly>
                    </td>
                </tr>

                <tr>
                    <td scope="row" style="width: 15%;">
                        <label for="Id_Penjualan" class="col-sm-1-12 col-form-label">
                            Id Penjualan</label>
                    </td>
                    <td>
                        <input list="list_jualan" name="Id_Penjualan" autocomplete="off"
                        id="Id_Penjualan"
                        class="form-control" onkeyup="isi_otomatis()">
                        <datalist id="list_jualan">
                            @foreach ($hasil_sales->data as $penjualan)                                                        

                            <option value="{{ $penjualan->id_penjualan }}">
                                                                                
                                @endforeach
                        </datalist>                        
                    </td>
                </tr>

                <tr>
                    <td scope="row" style="width: 15%;">
                        <label for="Id_Karyawan" class="col-sm-1-12 col-form-label">Id Karyawan</label>
                    </td>
                    <td>
                         <input list="list_karyawan" name="Id_Karyawan" autocomplete="off"
                        id="Id_Karyawan"
                        class="form-control" onkeyup="isi_otomatis()">
                        <datalist id="list_karyawan">
                            @foreach ($hasil_hrd as $karyawan)                                                        

                            <option value="{{ $karyawan->id }}">
                                                                                
                                @endforeach
                        </datalist>      
                    </td>
                </tr>

                <tr>
                    <td>
                        <label for="Id_Jadwal" class="col-sm-1-12 col-form-label">Id Jadwal</label>
                    </td>
                    <td>
                        <select class="custom-select my-1 mr-sm-2" id="Id_Jadwal" name="Id_Jadwal">
                            <option disabled selected>Pilih</option>
                            <?php $jadwal = DB::table('jadwal_pengiriman')->get(); ?>
                            @foreach ($jadwal as $jdwl)
                            <option value=" {{ $jdwl -> id_jadwal }} ">{{ $jdwl -> id_jadwal }}</option>
                            @endforeach
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="Id_Pelanggan" class="col-sm-1-12 col-form-label">Id Pelanggan</label>
                    </td>
                    <td>
                        <input type="text" class="form-control" name="Id_Pelanggan" id="Id_Pelanggan"
                            placeholder="Id Pelanggan" readonly                            
                            >
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="Status_Pelanggan" class="col-sm-1-12 col-form-label">Status Pelanggan</label>
                    </td>
                    <td>
                        <select class="custom-select my-1 mr-sm-2" id="Status_Pelanggan" name="Status_Pelanggan">
                            <option disabled selected>Pilih</option>
                            <option value="Dikemas">Dikemas</option>
                            <option value="Dalam Perjalanan">Dalam Perjalanan</option>
                            <option value="Sampai">Sampai</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" class="text-right">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </form>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script type="text/javascript">
            function isi_otomatis(){                
                var idpen = document.getElementById("Id_Penjualan").value;
                var baseurl = "https://cydt-salesmarketing.herokuapp.com/api/pelanggans/" + idpen;
                console.log(baseurl);
                $.ajax({
                    type: "get",
                    url: baseurl,
                    dataType: 'json',
                    success: function (data) {
                    var json = data;                    
                    document.getElementById("Id_Pelanggan").value = json.data.id
                    console.log(json.data.id);                    
                }
                });                
            }
        </script>

        {{-- <script>
            function isi_otomatis() {
             var jajal = document.getElementById("Id_Penjualan").value;
            console.log(jajal);

            }            
            </script> --}}


@endsection

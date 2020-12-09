@extends('master')
@section('konten')

@php
use GuzzleHttp\Client;
    $url_barang = "https://procurement-cydt.herokuapp.com/api/";

$client_barang = new Client([
    'base_uri' => $url_barang
]);
$response_barang = $client_barang->request('GET','barang')->getBody();
$hasil_barang = json_decode($response_barang);

$url_hrd = "https://hrd-cydt.herokuapp.com/api/karyawan";

$client_hrd = new Client([
    'base_uri' => $url_hrd
]);
$response_hrd = $client_hrd->request('GET','karyawan')->getBody();
$hasil_hrd = json_decode($response_hrd);




// $update_barang = $client_barang->request('PUT', 'barang/update-quantity/' . 1, [
//                         'form_params' => [
//                             'kuantitas' => 100
//                         ]
//                     ])->getBody();
//                     $hsl = json_decode($update_barang);
//                     echo $hsl->message;






@endphp

<div class="container" style="padding-top: 70px;">
    <h1 class="text-center">Edit Pengiriman</h1>    
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

    @if ($message = Session::get('Berhasil'))
       <div class="alert alert-success text-center">
           <p>{{ $message }}</p>
       </div>
       @endif

    @if ($message = Session::get('Gagal'))
       <div class="alert alert-danger text-center">
           <p>{{ $message }}</p>
       </div>
       @endif

       <form action="{{ route('ambil_barang.store') }}" method="POST">
        @csrf    
        <table class="table">
            <tr>
                    <td scope="row" style="width: 15%;">
                        <label for="Id_Karyawan" class="col-sm-1-12 col-form-label">Id_Karyawan</label>
                    </td>
                    <td>
                         <input list="list_karyawan" name="Id_Karyawan" autocomplete="off"
                        id="Id_Karyawan"
                        class="form-control">
                        <datalist id="list_karyawan">
                            @foreach ($hasil_hrd as $karyawan)                                                        

                            <option value="{{ $karyawan->id }}">
                                                                                
                                @endforeach
                        </datalist>      
                    </td>
                </tr>

                <tr>
                    <td scope="row" style="width: 15%;">
                        <label for="Id_Barang" class="col-sm-1-12 col-form-label">
                            Id Barang</label>
                    </td>
                    <td>
                        <input list="list_barang" name="Id_Barang" autocomplete="off"
                        id="Id_Barang" class="form-control" onkeyup="isi_otomatis()">
                        <datalist id="list_barang">
                            @foreach ($hasil_barang->data as $barang)                                                        

                            <option value="{{ $barang->id }}">
                                                                                
                                @endforeach
                        </datalist>                        
                    </td>
                </tr>                
                <tr>
                    <td scope="row" style="width: 15%;">
                        <label for="Jumlah_Barang" class="col-sm-1-12 col-form-label">
                            Jumlah Barang</label>
                    </td>
                    <td>
                        <input type="number" class="form-control" name="Jumlah_Barang" id="Jumlah_Barang">                    
                    </td>
                </tr>
                <tr>
                    <td colspan="2" class="text-right">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </td>                    
                </tr>
            </tbody>
        </table>
        <input type="hidden" name="Hasil" id="Hasil">
    </form>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script type="text/javascript">
            function isi_otomatis(){                
                var idbar = document.getElementById("Id_Barang").value;
                var baseurl = "https://procurement-cydt.herokuapp.com/api/barang/"+idbar;
                var ambil = document.getElementById("Jumlah_Barang").value;
                console.log(baseurl);
                var date = (new Date()).toISOString().split('T')[0];                       
                var dates = new Date().toLocaleTimeString();;               
                    console.log(date);
                    console.log(dates)                
                $.ajax({
                    type: "get",
                    url: baseurl,                                           
                    success: function (data) {
                    var json = data;
                    var kuantitas = json.data.kuantitas;                    
                    if(kuantitas <= 0){
                        var hasil = 0;
                        document.getElementById("Hasil").value = hasil;
                    }
                    else{
                        var hasil = kuantitas - ambil;
                        document.getElementById("Hasil").value = hasil;
                    }
                    console.log(kuantitas);                 
                    console.log(ambil);
                }
                });                
            }
        </script>

    @endsection
@extends('master')
@section('konten')

<?php 
use GuzzleHttp\Client;

header("Access-Control-Allow-Origin: *");
//header("Access-Control-Allow-Methods", "DELETE, POST, GET, OPTIONS");
header("Access-Control-Allow-Headers:*");

if ($_SERVER['REQUEST_METHOD'] == "OPTIONS") {//send back preflight request response
return "";
}

$url_hrd = "https://hrd-cydt.herokuapp.com/api/";

$client_hrd = new Client([
    'base_uri' => $url_hrd
]);
$response_hrd = $client_hrd->request('GET','karyawan')->getBody();
$hasil_hrd = json_decode($response_hrd);

$url_absensi = "https://hrd-cydt.herokuapp.com/api/";

$client_absensi = new Client([
    'base_uri' => $url_absensi
]);
$response_absensi = $client_hrd->request('GET','absensi')->getBody();
$hasil_absensi = json_decode($response_absensi);
echo $tgl_skr = date('Y-m-d')."<br>";
echo $jam_server = date('H:i:s')."<br>";

foreach ($hasil_absensi as $absen) {
    echo $absen->jam_masuk . "<br>";
    if ($absen->id_karyawan) {
        # code...
    }    
}
?>
<div class="container" style="margin-top: 65px;">
    <h1 class="text-center">Absensi</h1>

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


    <form action="{{ route('absen.store') }}" method="POST">
        @csrf
    <input id="Hari" value="{{ date("Y-m-d") }}" hidden>
        <table class="table">
                <tr>
                    <td scope="row" style="width: 15%;">
                        <label for="Id_Karyawan" class="col-sm-1-12 col-form-label">
                            Id Karyawan</label>
                    </td>
                    <td>
                        <input list="list_karyawan" name="Id_Karyawan" autocomplete="off"
                        id="Id_Karyawan"
                        class="form-control" onkeyup="isi_otomatis()">
                        <datalist id="list_karyawan">
                            @foreach ($hasil_hrd as $penjualan)                                                        

                            <option value="{{ $penjualan->id }}">
                                                                                
                                @endforeach
                        </datalist>                        
                    </td>
                </tr>                

                <tr>
                    <td class="text-left">
                    <button type="submit" class="btn btn-primary" value="{{ date('h:i') }}"
                    id="tombol">                        
                    
                    </button>
                    </td>                    
                </tr>
            </tbody>
        </table>
    </form>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script type="text/javascript">
            function isi_otomatis(){                
                var idkar = document.getElementById("Id_Karyawan").value;
                var baseurl = "https://hrd-cydt.herokuapp.com/api/karyawan";
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
                    console.log(data.id);
                    // if((json.id == idkar && json.jam_masuk == null) && json.tanggal_masuk == date ){
                    // document.getElementById("tombol").innerHTML = Masuk;
                    // }
                    // else{
                    //     document.getElementById("tombol").innerHTML = Keluar;
                    // }
                    console.log(json.data.id);                    
                }
                });                
            }
        </script>
       
@endsection

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
                        class="form-control">
                        <datalist id="list_karyawan">
                            @foreach ($hasil_hrd as $hrd)                                                        

                            <option value="{{ $hrd->id }}">
                                                                                
                                @endforeach
                        </datalist>                        
                    </td>
                </tr>   
                <tr>
                <td>
                    <label for="Jam_Masuk" class="col-sm-1-12 col-form-label">
                            Jam Masuk</label>
                </td>    
                <td>
                    <input type="text" name="Jam_Masuk" id="Jam_Masuk" class="form-control" autocomplete="off">
                </td>
                </tr>                             
                <tr>
                <td>
                    <label for="Jam_Keluar" class="col-sm-1-12 col-form-label">
                            Jam Keluar</label>
                </td>    
                <td>
                    <input type="text" name="Jam_Keluar" id="Jam_Keluar" class="form-control" autocomplete="off">
                </td>
                </tr>                             
                <tr>
                    <td class="text-center" colspan="2">
                    <button type="submit" class="btn btn-primary" id="tombol" style="width: 100%;">                      
                    Absen
                    </button>
                    </td>                    
                </tr>
            </tbody>
        </table>
        <input type="hidden" name="Tanggal" id="Tanggal">
    </form>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>        

        <script>
            $(document).ready(function(){
    $('#Jam_Masuk').timepicker({        
        timeFormat: 'HH:mm'        
    });
    
    $('#Jam_Keluar').timepicker({        
        timeFormat: 'HH:mm'
    });    
            
    var date = (new Date()).toISOString().split('T')[0];
    document.getElementById("Tanggal").value = date;
    });

        </script>
       
@endsection

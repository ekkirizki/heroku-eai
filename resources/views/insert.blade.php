@extends('master')
@section('konten')

@csrf
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
                        <label for="Id_Pengiriman" class="col-sm-1-12 col-form-label">Id_Pengiriman</label>
                    </td>
                    <td><input type="text" name="Id_Pengiriman" class="form-control"
                        id="Id_Pengiriman" value="{{ $Id }}" readonly>
                    </td>
                </tr>
                
                <tr>
                    <td scope="row" style="width: 15%;"><label for="Id_Penjualan"
                            class="col-sm-1-12 col-form-label">Id_Penjualan</label>
                    </td>
                    <td>
                        <input type="text" class="form-control" name="Id_Penjualan" id="Id_Penjualan"
                            placeholder="Id Penjualan">
                    </td>
                </tr>

                <tr>
                    <td scope="row" style="width: 15%;">
                        <label for="Id_Karyawan" class="col-sm-1-12 col-form-label">Id_Karyawan</label>
                    </td>
                    <td>
                        <input type="text" class="form-control" name="Id_Karyawan" id="Id_Karyawan"
                            placeholder="Id Karyawan">          
                    </td>
                </tr>

                <tr>
                    <td>
                        <label for="Id_Jadwal" class="col-sm-1-12 col-form-label">Id_Jadwal</label>
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
                        <label for="Id_Pelanggan" class="col-sm-1-12 col-form-label">Id_Pelanggan</label>
                    </td>
                    <td>
                        <input type="text" class="form-control" name="Id_Pelanggan" id="Id_Pelanggan"
                            placeholder="Id Pelanggan">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="Status_Pelanggan" class="col-sm-1-12 col-form-label">Status_Pelanggan</label>
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

@endsection

@extends('master')
@section('konten')

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

    @if ($message = Session::get('Gagal'))
       <div class="alert alert-danger text-center">
           <p>{{ $message }}</p>
       </div>
       @endif

@foreach ($pengiriman as $peng)  
    <form action="{{ route('update', $peng -> id_pengiriman) }}" method="POST">
        @csrf
        <table class="table">                                                              
            <tbody>
                <tr>                                                              
                    <td scope="row" style="width: 15%;">
                        <label for="Id_Pengiriman" class="col-sm-1-12 col-form-label">Id_Pengiriman</label>
                    </td>
                    <td><input type="text" name="Id_Pengiriman" class="form-control"
                        id="Id_Pengiriman" value="{{ $peng->id_pengiriman }}" readonly>
                    </td>
                </tr>
                
                <tr>
                    <td scope="row" style="width: 15%;"><label for="Id_Penjualan"
                            class="col-sm-1-12 col-form-label">Id_Penjualan</label>
                    </td>
                    <td>
                        <input type="text" class="form-control" name="Id_Penjualan" id="Id_Penjualan"
                            placeholder="Id Penjualan" value=" {{ $peng->id_penjualan }} ">
                    </td>
                </tr>

                <tr>
                    <td scope="row" style="width: 15%;">
                        <label for="Id_Karyawan" class="col-sm-1-12 col-form-label">Id_Karyawan</label>
                    </td>
                    <td>
                        <input type="text" class="form-control" name="Id_Karyawan" id="Id_Karyawan"
                            placeholder="Id Karyawan" value=" {{ $peng->id_karyawan }} ">          
                    </td>
                </tr>

                <tr>
                    <td>
                        <label for="Id_Jadwal" class="col-sm-1-12 col-form-label">Id_Jadwal</label>
                    </td>
                    <td>
                        <select class="custom-select my-1 mr-sm-2" id="Id_Jadwal" name="Id_Jadwal">
                            <option disabled>Pilih</option>
                            <?php $jadwal = DB::table('jadwal_pengiriman')->get(); ?>
                            @foreach ($jadwal as $jdwl)                            
                            <option value=" {{ $jdwl -> id_jadwal }} " @if($peng -> id_jadwal == $jdwl -> id_jadwal) selected @endif>{{ $jdwl -> id_jadwal }}</option>                                                    
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
                            placeholder="Id Pelanggan" value=" {{ $peng -> id_pelanggan }} ">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="Status_Pelanggan" class="col-sm-1-12 col-form-label">Status_Pelanggan</label>
                    </td>
                    <td>
                        <select class="custom-select my-1 mr-sm-2" id="Status_Pelanggan" name="Status_Pelanggan">
                            <option disabled>Pilih</option>
                            <option value="Dikemas" @if($peng -> status_pelanggan == "Dikemas") selected @endif> Dikemas</option>
                            <option value="Dalam Perjalanan"@if($peng -> status_pelanggan == "Dalam Perjalanan") selected @endif>Dalam Perjalanan</option>
                            <option value="Sampai" @if($peng -> status_pelanggan == "Sampai") selected @endif>Sampai</option>
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
    @endforeach
</div>

@endsection

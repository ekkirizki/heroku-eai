@extends('master')
@section('konten')

@csrf
<div class="container" style="padding-top: 20px;">
    <h1 class="text-center">Tambah Pengiriman</h1>
    <form>
        <table class="table">
            <tbody>
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
                    <td scope="row" style="width: 15%;"><label for="Id_Penjualan"
                            class="col-sm-1-12 col-form-label">Id_Penjualan</label>
                    </td>
                    <td>
                        <input type="text" class="form-control" name="Id_Penjualan" id="Id_Penjualan"
                            placeholder="Id Penjualan">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="Id_Jadwal" class="col-sm-1-12 col-form-label">Id_Jadwal</label>
                    </td>
                    <td>
                        <input type="text" class="form-control" name="Id_Jadwal" id="Id_Jadwal" placeholder="Id Jadwal">
                    </td>
                </tr>
                <tr>
                    <td>
                         <label for="Id_Pelanggan" class="col-sm-1-12 col-form-label">Id_Pelanggan</label>                         
                    </td>
                    <td>
                        <input type="text" class="form-control" name="Id_Pelanggan" id="Id_Pelanggan" placeholder="Id Pelanggan">
                    </td>
                </tr>
                <tr>
                    <td>
                         <label for="Status_Pelanggan" class="col-sm-1-12 col-form-label">Status_Pelanggan</label>
                    </td>
                    <td>
                        <input type="text" class="form-control" name="Status_Pelanggan" id="Status_Pelanggan" placeholder="Status Pelanggan">
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

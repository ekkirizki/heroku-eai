<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>Logistik</title>
    <style>
        body {
            padding-top: 50px;
        }

        .cari {
            background-image: url("{{ asset('gambar/search.png') }}");
            background-size: 40px;
            background-repeat: no-repeat;
            padding-left: 40px;
        }

    </style>
</head>

<body>
   @extends('master')
    <div class="container-fluid" style="padding-top: 20px;">
        <div class="container">
            <form>
                <div class="form-group row">
                    <label for="inputName" class="col-sm-1-12 col-form-label"></label>
                    <div class="col-11">
                        <input type="text" class="form-control cari" name="inputName"
                            placeholder="Id Penjualan" id="inputan" onkeyup="cari()">
                    </div>
                    <div class="col-1">
                    <a href="" class="btn btn-primary"> Tambah</a>    
                    </div>                    
                </div>
            </form>
        </div>
    </div>
    </form>        
    <table class="table text-center" id="pengiriman">
        <thead>
            <tr>
                <th>Id_Pengiriman</th>
                <th>Id_Karyawan</th>
                <th>Id_Penjualan</th>
                <th>Id_Jadwal</th>
                <th>Id_Pelanggan</th>
                <th>Status_Pengiriman</th>
                <th>Opsi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($Pengiriman as $Peng)                            
            <tr>
                <td scope="row">{{ $Peng -> Id_Pengiriman }}</td>
            <td>{{ $Peng -> Id_Karyawan }}</td>
                <td> {{ $Peng -> Id_Penjualan}} </td>
            <td> {{ $Peng -> Id_Jadwal }}</td>
            <td> {{ $Peng -> Id_Pelanggan }} </td>
            <td> {{ $Peng -> Status_Pelanggan }} </td>
            <td>
                <span><a href="" class="btn btn-primary"> Edit </a></span> | 
                <span><a href="" class="btn btn-danger"> Hapus</a></span>
            </td>
            </tr>            
            @endforeach
        </tbody>
    </table>

     <script>
        function cari() {
            var input, filter, tabel, tr, td, i, txtvalue;
            input = document.getElementById("inputan");
            filter = input.value;
            tabel = document.getElementById("pengiriman");
            tr = document.getElementsByTagName("tr");

            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[2];
                if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }

    </script>
    </div>
</body>
</html>
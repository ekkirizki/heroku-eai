@extends('master')

@section('konten')

<div class="container-fluid" style="padding-top: 20px;">
        <div class="container">
            <form>
                <div class="form-group row">
                    <label for="inputName" class="col-sm-1-12 col-form-label"></label>
                    <div class="col">
                        <input type="text" class="form-control cari" name="inputName"
                            placeholder="Id Jadwal" id="inputan" onkeyup="cari()">
                    </div>                    
                </div>
            </form>
        </div>
    </div>
    </form>
    <table class="table text-center" id="pengiriman">
        <thead>
            <tr>
                <th>Id_Jadwal</th>
                <th>Hari_Pengiriman</th>
                <th>Jam_Pengiriman</th>                
            </tr>
        </thead>
        <tbody>
            @foreach ($jadwal as $kirim)            
            <tr>
                <td scope="row">{{ $kirim -> Id_Jadwal }}</td>
                <td>{{ $kirim -> Hari_Pengiriman }}</td>
                <td>{{ $kirim -> Jam_Pengiriman }}</td>
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
                td = tr[i].getElementsByTagName("td")[0];
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
    @endsection
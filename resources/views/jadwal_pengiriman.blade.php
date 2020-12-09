@extends('master')

@section('konten')

    <div class="container">
        <form>
            <div class="form-group row">
                <label for="inputName" class="col-sm-1-12 col-form-label"></label>
                <div class="col">
                    <input type="text" class="form-control cari" name="inputName" placeholder="Id Jadwal" id="inputan"
                        onkeyup="cari()">
                </div>
            </div>
        </form>
    </div>
</div>
</form>
    <table class="table text-center" id="pengiriman">
        <thead>
            <tr>
                <th>Id Jadwal</th>
                <th>Hari Pengiriman</th>
                <th>Jam Pengiriman</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($jadwal as $kirim)
            <tr>
                <td scope="row">{{ $kirim -> id_jadwal }}</td>
                <td>{{ $kirim -> hari_pengiriman }}</td>
                <td>{{ $kirim -> jam_pengiriman }}</td>
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
@endsection

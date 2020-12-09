   @extends('master')
   @section('konten')

   <div class="container" style="padding-top: 65px; padding-bottom: 10px;">
       <form>
           <div class="form-group row">
               <label for="inputName" class="col-sm-1-12 col-form-label"></label>
               <div class="col-11">
                   <input type="text" class="form-control cari" name="inputName" placeholder="Id Penjualan" id="inputan"
                       onkeyup="cari()">
               </div>
               <div class="col-1">
                   <a href="{{ route('create') }}" class="btn btn-primary"> Tambah</a>
               </div>
           </div>
       </form>
   </div>
   <div class="container-fluid">
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
   </div>
   <table class="table text-center" id="pengiriman">
       <thead>
           <tr>
               <th>Id Pengiriman</th>
               <th>Id Penjualan</th>
               <th>Id Karyawan</th>
               <th>Id Jadwal</th>
               <th>Id Pelanggan</th>
               <th>Status Pengiriman</th>
               <th>Opsi</th>
           </tr>
       </thead>
       <tbody>
           @foreach ($pengiriman as $Peng)
           <tr>
               <td scope="row">{{ $Peng -> id_pengiriman }}</td>
               <td> {{ $Peng -> id_penjualan}} </td>
               <td> {{ $Peng -> id_karyawan }}</td>
               <td> {{ $Peng -> id_jadwal }}</td>
               <td> {{ $Peng -> id_pelanggan }} </td>
               <td> {{ $Peng -> status_pelanggan }} </td>
               <td>
                   <span><a href="{{ route('edit', $Peng->id_pengiriman) }}" class="btn btn-primary"> Edit </a></span> |
                   <span><a href=" {{ route('hapus', $Peng->id_pengiriman)}}" class="btn btn-danger"> Hapus</a></span>
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

           console.log(filter);
           for (i = 0; i < tr.length; i++) {
               td = tr[i].getElementsByTagName("td")[1];
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

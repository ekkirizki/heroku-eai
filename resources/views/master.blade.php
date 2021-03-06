<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>Logistik</title>    
</head>
<body>
    <header>
     <nav class="navbar navbar-expand-md navbar-light bg-light fixed-top">
        <nav class="nav nav-pills justify-content-center">
            <a @if(URL::current() == url('')) class="navbar-brand active" @else class="navbar-brand" @endif
            href="{{ route('index') }}"><img src="{{ asset('gambar/truck.png') }}"
                    alt="Logistik" width="30px" height="30px"> Logistik</a>
            <a @if(URL::current() == url('/jadwal_pengiriman')) class="nav-link active" @else class="nav-link" @endif
             href="{{ route('jadwal_pengiriman') }}"> Jadwal Pengiriman</a>
             <a @if(URL::current() == url('/absensi')) class="nav-link active" @else class="nav-link" @endif
             href="{{ route('absen.index') }}"> Absensi</a>                        
             <a @if(URL::current() == url('/ambil_barang')) class="nav-link active" @else class="nav-link" @endif
             href="{{ route('ambil_barang.index') }}"> Ambil Barang</a>       
        </nav>
    </nav>
    </header>
    
    @yield('konten')

</body>
</html>
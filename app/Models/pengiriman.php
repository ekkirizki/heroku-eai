<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pengiriman extends Model
{
    use HasFactory;
    protected $kirim = ['Id_Pengiriman', 'Id_Karyawan', 'Id_Penjualan', 'Id_Jadwal', 'Id_Pelanggan', 'Status_Pengiriman'];
}

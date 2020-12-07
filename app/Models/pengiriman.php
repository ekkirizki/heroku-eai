<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pengiriman extends Model
{
    use HasFactory;
    protected $table = 'pengiriman';
    protected $fillable = [
        'id_pengiriman',
        'id_karyawan',
        'id_penjualan',
        'id_jadwal',
        'id_pelanggan',
        'status_pengiriman'
    ];
    protected $PrimaryKey = 'id_pengiriman'; //buat ganti primarykey
}

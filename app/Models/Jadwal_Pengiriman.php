<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal_Pengiriman extends Model
{
    use HasFactory;
    protected $peng = ['Id_Jadwal', 'Hari_Pengiriman', 'Jam_Pengiriman'];
}

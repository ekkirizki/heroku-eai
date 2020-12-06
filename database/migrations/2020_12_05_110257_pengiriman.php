<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class Pengiriman extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('pengiriman', function (Blueprint $table) {
            $table->string('Id_Pengiriman')->primary('Id_Pengiriman');
            $table->string('Id_Karyawan');
            $table->string('Id_Penjualan');
            $table->string('Id_Jadwal')->foreign('Id_Jadwal')->references('Id_Jadwal')->on('Jadwal_Pengiriman');
            $table->string('Id_Pelanggan');
            $table->string('Status_Pelanggan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('pengiriman');
    }
}

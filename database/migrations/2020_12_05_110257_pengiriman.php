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
            $table->string('id_pengiriman')->primary('id_Pengiriman');
            $table->string('id_karyawan');
            $table->string('id_penjualan');
            $table->string('id_jadwal')->foreign('id_jadwal')->references('id_jadwal')->on('jadwal_pengiriman');
            $table->string('id_pelanggan');
            $table->string('status_pelanggan');
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('created_at')->useCurrent();
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

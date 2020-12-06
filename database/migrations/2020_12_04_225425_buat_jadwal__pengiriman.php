<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class BuatJadwalPengiriman extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //                        
        Schema::create('jadwal_pengiriman', function (Blueprint $table) {
            $table->string('Id_Jadwal')->primary('Id_Jadwal');
            $table->string('Hari_Pengiriman');
            $table->time('Jam_Pengiriman');
        });

        DB::table('jadwal_pengiriman')->insert([
            [
                'Id_Jadwal' => 'SEN10',
                'Hari_Pengiriman' => 'Senin',
                'Jam_Pengiriman' => 100000
            ],
            [
                'Id_Jadwal' => 'SEL10',
                'Hari_Pengiriman' => 'Selasa',
                'Jam_Pengiriman' => 100000
            ],
            [
                'Id_Jadwal' => 'RAB10',
                'Hari_Pengiriman' => 'Rabu',
                'Jam_Pengiriman' => 100000
            ],
            [
                'Id_Jadwal' => 'KAM10',
                'Hari_Pengiriman' => 'Kamis',
                'Jam_Pengiriman' => 100000
            ],
            [
                'Id_Jadwal' => 'JUM10',
                'Hari_Pengiriman' => 'Jumat',
                'Jam_Pengiriman' => 100000
            ],
            [
                'Id_Jadwal' => 'SEN14',
                'Hari_Pengiriman' => 'Senin',
                'Jam_Pengiriman' => 140000
            ],
            [
                'Id_Jadwal' => 'SEL14',
                'Hari_Pengiriman' => 'Selasa',
                'Jam_Pengiriman' => 140000
            ],
            [
                'Id_Jadwal' => 'RAB14',
                'Hari_Pengiriman' => 'Rabu',
                'Jam_Pengiriman' => 140000
            ],
            [
                'Id_Jadwal' => 'KAM14',
                'Hari_Pengiriman' => 'Kamis',
                'Jam_Pengiriman' => 140000
            ],
            [
                'Id_Jadwal' => 'JUM14',
                'Hari_Pengiriman' => 'Jumat',
                'Jam_Pengiriman' => 140000
            ]
        ]);
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('jadwal_pengiriman');
    }
}

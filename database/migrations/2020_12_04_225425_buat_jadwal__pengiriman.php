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
            $table->string('id_jadwal')->primary('id_jadwal');
            $table->string('hari_pengiriman');
            $table->time('jam_pengiriman');
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('created_at')->useCurrent();
        });

        DB::table('jadwal_pengiriman')->insert([
            [
                'id_jadwal' => 'SEN10',
                'hari_pengiriman' => 'Senin',
                'jam_pengiriman' => 100000,
                'created_at' => date("Y-m-d H:i:s")
            ],
            [
                'id_jadwal' => 'SEL10',
                'hari_pengiriman' => 'Selasa',
                'jam_pengiriman' => 100000,
                'created_at' => date("Y-m-d H:i:s")
            ],
            [
                'id_jadwal' => 'RAB10',
                'hari_pengiriman' => 'Rabu',
                'jam_pengiriman' => 100000,
                'created_at' => date("Y-m-d H:i:s")
            ],
            [
                'id_jadwal' => 'KAM10',
                'hari_pengiriman' => 'Kamis',
                'jam_pengiriman' => 100000,
                'created_at' => date("Y-m-d H:i:s")
            ],
            [
                'id_jadwal' => 'JUM10',
                'hari_pengiriman' => 'Jumat',
                'jam_pengiriman' => 100000,
                'created_at' => date("Y-m-d H:i:s")
            ],
            [
                'id_jadwal' => 'SEN14',
                'hari_pengiriman' => 'Senin',
                'jam_pengiriman' => 140000,
                'created_at' => date("Y-m-d H:i:s")
            ],
            [
                'id_jadwal' => 'SEL14',
                'hari_pengiriman' => 'Selasa',
                'jam_pengiriman' => 140000,
                'created_at' => date("Y-m-d H:i:s")
            ],
            [
                'id_jadwal' => 'RAB14',
                'hari_pengiriman' => 'Rabu',
                'jam_pengiriman' => 140000,
                'created_at' => date("Y-m-d H:i:s")
            ],
            [
                'id_jadwal' => 'KAM14',
                'hari_pengiriman' => 'Kamis',
                'jam_pengiriman' => 140000,
                'created_at' => date("Y-m-d H:i:s")
            ],
            [
                'id_jadwal' => 'JUM14',
                'hari_pengiriman' => 'Jumat',
                'jam_pengiriman' => 140000,
                'created_at' => date("Y-m-d H:i:s")
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

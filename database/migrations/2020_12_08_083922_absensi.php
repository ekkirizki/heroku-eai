<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Absensi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('absensi', function (Blueprint $table) {
            $table->id();
            $table->string('id_karyawan');
            $table->time("jam_masuk");
            $table->time("jam_keluar");
            $table->date("tanggal_absensi");
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
    }
}

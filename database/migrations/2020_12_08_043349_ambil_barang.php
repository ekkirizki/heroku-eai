<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AmbilBarang extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('ambil_barang', function (Blueprint $table) {
            $table->id();
            $table->string('id_barang');
            $table->string('id_karyawan');
            $table->integer('jumlah_barang');
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
        Schema::dropIfExists('ambil_barang');
    }
}

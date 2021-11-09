<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePembayaranInfakTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pembayaran_infak', function (Blueprint $table) {
            $table->id('id_pembayaran_infak');
            $table->bigInteger('id_biodata_siswa')->unsigned();
            $table->integer('infak_bangunan');
            $table->integer('infak_pendaftaran');
            $table->integer('infak_ekskul');
            $table->date('tanggal_pembayaran');
            $table->timestamps();
        });

        Schema::table('pembayaran_infak', function (Blueprint $table) {
            $table->foreign('id_biodata_siswa')->references('id_biodata_siswa')->on('biodata_siswa')
                ->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pembayaran_infak');
    }
}

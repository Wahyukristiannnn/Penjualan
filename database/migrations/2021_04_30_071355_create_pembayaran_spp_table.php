<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePembayaranSppTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pembayaran_spp', function (Blueprint $table) {
            $table->id('id_pembayaran_spp');
            $table->bigInteger('id_biodata_siswa')->unsigned();
            $table->bigInteger('id_kelas')->unsigned();
            $table->bigInteger('id_spp')->unsigned();
            $table->bigInteger('id_tahun_ajaran')->unsigned();
            $table->date('tanggal_pembayaran');
            $table->string('bulan');
            $table->enum('status', ['Lunas','Belum Lunas']);
            $table->timestamps();
        });

        Schema::table('pembayaran_spp', function (Blueprint $table) {
            $table->foreign('id_biodata_siswa')->references('id_biodata_siswa')->on('biodata_siswa')
                ->onDelete('cascade')->onUpdate('cascade');
        });
        Schema::table('pembayaran_spp', function (Blueprint $table) {
            $table->foreign('id_kelas')->references('id_kelas')->on('kelas')
                ->onDelete('cascade')->onUpdate('cascade');
        });
        Schema::table('pembayaran_spp', function (Blueprint $table) {
            $table->foreign('id_spp')->references('id_spp')->on('spp')
                ->onDelete('cascade')->onUpdate('cascade');
        });
        Schema::table('pembayaran_spp', function (Blueprint $table) {
            $table->foreign('id_tahun_ajaran')->references('id_tahun_ajaran')->on('tahun_ajaran')
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
        Schema::dropIfExists('pembayaran_spp');
    }
}

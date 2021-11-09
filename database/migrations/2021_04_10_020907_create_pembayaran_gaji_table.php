<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePembayaranGajiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pembayaran_gaji', function (Blueprint $table) {
            $table->id('id_pembayaran_gaji');
            $table->bigInteger('id_kategori_gaji')->unsigned();
            $table->bigInteger('id_biodata_mudhir')->unsigned();
            $table->bigInteger('id_gaji')->unsigned();
            $table->date('tanggal_pembayaran');
            $table->string('bulan', 30);
            $table->timestamps();
        });

        Schema::table('pembayaran_gaji', function (Blueprint $table) {
            $table->foreign('id_kategori_gaji')->references('id_kategori_gaji')->on('kategori_gaji')
                ->onDelete('cascade')->onUpdate('cascade');
        });

        Schema::table('pembayaran_gaji', function (Blueprint $table) {
            $table->foreign('id_biodata_mudhir')->references('id_biodata_mudhir')->on('biodata_mudhir')
                ->onDelete('cascade')->onUpdate('cascade');
        });

        Schema::table('pembayaran_gaji', function (Blueprint $table) {
            $table->foreign('id_gaji')->references('id_gaji')->on('gaji')
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
        Schema::dropIfExists('pembayaran_gaji');
    }
}

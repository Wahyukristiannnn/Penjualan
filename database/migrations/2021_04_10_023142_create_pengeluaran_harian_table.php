<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengeluaranHarianTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengeluaran_harian', function (Blueprint $table) {
            $table->id('id_pengeluaran_harian');
            $table->bigInteger('id_jenis_pengeluaran')->unsigned();
            $table->integer('biaya');
            $table->date('tanggal_pengeluaran');
            $table->string('nama_penginfak',50);
            $table->enum('status',['infak','tunai']);
            $table->timestamps();
        });

        Schema::table('pengeluaran_harian', function (Blueprint $table) {
            $table->foreign('id_jenis_pengeluaran')->references('id_jenis_pengeluaran')->on('jenis_pengeluaran')
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
        Schema::dropIfExists('pengeluaran_harian');
    }
}

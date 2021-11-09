<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBiodataSiswaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('biodata_siswa', function (Blueprint $table) {
            $table->id('id_biodata_siswa');
            $table->integer('NIS');
            $table->string('nama_siswa',50);
            $table->string('nama_samaran_siswa',50);
            $table->string('asal_sekolah',50);
            $table->string('nama_ayah',50);
            $table->string('nama_ibu',50);
            $table->string('telp_orang_tua');
            $table->string('alamat_orang_tua',60);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('biodata_siswa');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKelasAjaranTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kelas_ajaran', function (Blueprint $table) {
            $table->id('id_kelas_ajaran');
            $table->bigInteger('id_kelas')->unsigned();
            $table->bigInteger('id_tahun_ajaran')->unsigned();
            $table->bigInteger('id_biodata_siswa')->unsigned();
            $table->string('nama_kelas_ajaran');
            $table->timestamps();
        });

        Schema::table('kelas_ajaran', function (Blueprint $table) {
            $table->foreign('id_kelas')->references('id_kelas')->on('kelas')
                ->onDelete('cascade')->onUpdate('cascade');
        });
        Schema::table('kelas_ajaran', function (Blueprint $table) {
            $table->foreign('id_tahun_ajaran')->references('id_tahun_ajaran')->on('tahun_ajaran')
                ->onDelete('cascade')->onUpdate('cascade');
        });
        Schema::table('kelas_ajaran', function (Blueprint $table) {
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
        Schema::dropIfExists('kelas_ajaran');
    }
}

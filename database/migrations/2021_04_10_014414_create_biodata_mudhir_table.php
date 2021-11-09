<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBiodataMudhirTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('biodata_mudhir', function (Blueprint $table) {
            $table->id('id_biodata_mudhir');
            $table->bigInteger('id_kategori_gaji')->unsigned();
            $table->string('nama_mudhir', 50);
            $table->string('alamat', 50);
            $table->string('no_telepon', 12);
            $table->enum('jenis_kelamin', ['laki-laki','perempuan']);
            $table->string('pendidikan', 50);
            $table->string('bidang_ilmu', 50)->nullable();
            $table->binary('foto')->nullable();
            $table->timestamps();
        });

        Schema::table('biodata_mudhir', function (Blueprint $table) {
            $table->foreign('id_kategori_gaji')->references('id_kategori_gaji')->on('kategori_gaji')
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
        Schema::dropIfExists('biodata_mudhir');
    }
}

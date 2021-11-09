<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePemasukanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pemasukan', function (Blueprint $table) {
            $table->id('id_pemasukan');
            $table->bigInteger('id_kategori')->unsigned();
            $table->date('tanggal');
            $table->integer('jumlah');
            $table->string('keterangan', 50);
            $table->timestamps();
        });

        Schema::table('pemasukan', function (Blueprint $table) {
            $table->foreign('id_kategori')->references('id_kategori')->on('kategori')
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
        Schema::dropIfExists('pemasukan');
    }
}

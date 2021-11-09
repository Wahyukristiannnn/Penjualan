<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDonaturTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donatur', function (Blueprint $table) {
            $table->id('id_donatur');
            $table->string('nama_donatur',30);
            $table->enum('jenis_donatur',['Tunai','Barang']);
            $table->char('nominal');
            $table->string('barang',50);
            $table->text('keterangan');
            $table->date('tanggal_donatur');
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
        Schema::dropIfExists('donatur');
    }
}

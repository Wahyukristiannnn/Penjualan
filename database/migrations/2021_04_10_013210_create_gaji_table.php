<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGajiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gaji', function (Blueprint $table) {
            $table->id('id_gaji');
            $table->bigInteger('id_kategori_gaji')->unsigned();
            $table->char('gaji');
            $table->timestamps();
        });

        Schema::table('gaji', function (Blueprint $table) {
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
        Schema::dropIfExists('gaji');
    }
}

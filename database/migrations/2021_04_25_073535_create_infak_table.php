<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInfakTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('infak', function (Blueprint $table) {
            $table->id('id_infak');
            $table->integer('infak_bangunan');
            $table->integer ('infak_pendaftaran');
            $table->string('ekskul',50);
            $table->timestamps();
        });

        // Schema::table('infak', function (Blueprint $table) {
        //     $table->foreign('id_pendaftaran')->references('id_pendaftaran')->on('pendaftaran')
        //         ->onDelete('cascade')->onUpdate('cascade');
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('infak');
    }
}

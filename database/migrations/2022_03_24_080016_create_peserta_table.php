<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePesertaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peserta', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_kegiatan');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('usia');
            $table->string('jk');
            $table->string('nomorhp');
            $table->string('kota');
            $table->string('provinsi');
            $table->string('pendidikan');
            $table->string('pekerjaan');


            $table->foreign('id_kegiatan')->references('id_kegiatan')->on('kegiatan')
            ->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('peserta');
    }
}

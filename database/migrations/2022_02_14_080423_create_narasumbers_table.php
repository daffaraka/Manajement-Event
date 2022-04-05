<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNarasumbersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('narasumber', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_kategori_narasumber');
            $table->string('nama_kategori_narasumber');
            $table->char('nama');
            $table->string('nomorhp');
            $table->string('email');
            $table->string('jk');
            $table->string('pendidikan');
            $table->string('pekerjaan');
            $table->string('kota');
            $table->string('provinsi');
            $table->timestamps();

            $table->foreign('id_kategori_narasumber')->references('id_kategori')->on('kategori_narasumber')
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
        Schema::dropIfExists('narasumber');
    }
}

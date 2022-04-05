<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePendaftaranPesertasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pendaftaran_peserta', function (Blueprint $table) {
            $table->bigIncrements('Id_Pendaftaran_Peserta');
            // $table->unsignedBigInteger('Id_Peserta');
            // $table->unsignedBigInteger('Id_Kegiatan');
            $table->text('PendaftaranPeserta');
            // $table->foreign('Id_Peserta')->references('Id_Peserta')->on('peserta')->onDelete('cascade');
            // $table->foreign('Id_Kegiatan')->references('Id_Kegiatan')->on('kegiatan')->onDelete('cascade');
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
        Schema::dropIfExists('pendaftaran_peserta');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLinkAbsensisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('link_absensi', function (Blueprint $table) {
            $table->bigIncrements('Id_Link_Absensi');
            $table->unsignedBigInteger('Id_Pendaftaran_Peserta');
            $table->unsignedBigInteger('Id_Kegiatan');
            $table->text('BuktiAbsensi');
            $table->text('TTD');
            // $table->foreign('Id_Pendaftaran_Peserta')->references('Id_Pendaftaran_Peserta')->on('pendaftaran_peserta')->onDelete('cascade');
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
        Schema::dropIfExists('link_absensi');
    }
}

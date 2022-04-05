<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNarasumberKegiatansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('narasumber_kegiatan', function (Blueprint $table) {
            $table->bigIncrements('Id_Narasumber_Kegiatan');
            $table->unsignedBigInteger('Id_Narasumber');
            $table->unsignedBigInteger('Id_Kegiatan');
            // $table->foreign('Id_Narasumber')->references('Id_Narasumber')->on('narasumber')->onDelete('cascade');
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
        Schema::dropIfExists('narasumber_kegiatan');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKegiatansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kegiatan', function (Blueprint $table) {

            $table->bigIncrements('id_kegiatan');
            $table->string('banner');
            $table->string('namakegiatan');
            $table->string('kota')->nullable();
            $table->string('provinsi')->nullable();
            $table->dateTime('waktu');
            $table->char('jenis', 7);
            $table->string('target');
            $table->text('undangan');
            $table->text('deskripsi');
            $table->integer('anggaran');
            $table->text('rundown');
            $table->text('mediapromosi');
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
        Schema::dropIfExists('kegiatan');
    }
}

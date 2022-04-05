<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePertanyaansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pertanyaans', function (Blueprint $table) {
            $table->id('pertanyaan_id');
            $table->string('pertanyaan');
            $table->string('jawaban');
            $table->timestamps();
        });

        /** gunakan script berikut jika ingin menambah data otomatis */
        // $jawabans = $table->increments('id');
        // $table->text('soal');
        // $table->text('opsiA');
        // $table->text('opsiB');
        // $table->text('opsiC');
        // $table->text('opsiD');
        // $table->string('opsiBenar');
        // $table->integer('pertanyaan_id');
        // $table->timestamps();
        // for ($a = 1; $a <= 15; $a++)
        //     DB::table('tb_pertanyaan')->insert([
        //         'pertanyaan_title' => 'Judul Artikel ' . $a,
        //         'jawaban' => $jawabans[array_rand($jawabans)],
        //     ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pertanyaans');
    }
}

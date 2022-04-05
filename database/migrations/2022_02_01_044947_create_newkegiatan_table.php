<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewkegiatanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('newkegiatan', function (Blueprint $table) {
             $table->id('post_id');
            $table->string('post_title');
            $table->string('category');
            $table->string('image')->nullable();
            $table->text('content')->nullable();
            $table->timestamps();
        });

        /** gunakan script berikut jika ingin menambah data otomatis */
        $categories = ['Politik', 'Kesehatan', 'Olahraga'];
        for ($a = 1; $a <= 15; $a++)
            DB::table('newkegiatan')->insert([
                'post_title' => 'Judul Artikel ' . $a,
                'category' => $categories[array_rand($categories)],
            ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('newkegiatan');
    }
}

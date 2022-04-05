<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAkunsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('akun', function (Blueprint $table) {
            $table->bigIncrements('Id_Akun');
            $table->unsignedBigInteger('Id_Lvl_Akun');
            $table->string('Username', 30);
            $table->string('Password', 18);
            $table->foreign('Id_Lvl_Akun')->references('Id_Lvl_Akun')->on('level_akun')->onDelete('cascade');
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
        Schema::dropIfExists('akun');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengawasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengawas', function (Blueprint $table) {
            $table->bigIncrements('Id_Pengawas');
            $table->unsignedBigInteger('Id_Akun');
            $table->char('NamaPengawas', 30);
            $table->integer('NoHP');
            $table->string('Email', 30);
            $table->char('JK', 1);
            $table->char('Kota', 99);
            $table->char('Provinsi', 99);
            $table->foreign('Id_Akun')->references('Id_Akun')->on('akun')->onDelete('cascade');
            $table->timestamps();
        });
        
        // Schema::create('pengawas', function (Blueprint $table) {
        //     $table->id();
        //     $table->string('name');
        //     $table->string('username');
        //     $table->string('kota');
        //     $table->string('provinsi');
        //     $table->string('jeniskelamin');
        //     $table->string('email')->unique();
        //     $table->timestamp('email_verified_at')->nullable();
        //     $table->string('nomorhp');
        //     $table->string('password');
        //     $table->rememberToken();
        //     $table->timestamps();
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pengawas');
    }
}

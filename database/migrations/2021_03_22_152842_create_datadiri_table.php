<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDatadiriTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('datadiri', function (Blueprint $table) {
            $table->id();
            $table->string('nik', 16)->unique();
            $table->string('nama');
            $table->string('tempat');
            $table->date('tgl_lahir');
            $table->string('jk');
            $table->longText('alamat');
            $table->string('kecamatan');
            $table->string('agama');
            $table->string('status_perkawinan');
            $table->string('pekerjaan');
            $table->string('foto_ktp');
            $table->string('foto_akta');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            // $table->softDeletes()->nullable();
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
        Schema::dropIfExists('datadiri');
    }
}

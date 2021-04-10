<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePesertaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peserta', function (Blueprint $table) {
            $table->id();
            $table->string('nisn', 16);
            $table->string('asal_sekolah');
            $table->string('lulus_tahun', 5);
            $table->string('foto');
            $table->string('foto_ptn')->nullable();
            $table->enum('status', ['evaluasi', 'gagal', 'lulus']);
            $table->enum('status_mhs', ['baru', 'aktif']);
            $table->unsignedBigInteger('perting_id');
            $table->unsignedBigInteger('fakultas_id');
            $table->unsignedBigInteger('jurusan_id');
            $table->unsignedBigInteger('datadiri_id');
            $table->unsignedBigInteger('kk_id');
            $table->unsignedBigInteger('prestasi_kode');
            $table->unsignedBigInteger('user_id');
            $table->foreign('perting_id')->references('id')->on('perting');
            $table->foreign('fakultas_id')->references('id')->on('fakultas');
            $table->foreign('jurusan_id')->references('id')->on('jurusan');
            $table->foreign('datadiri_id')->references('id')->on('datadiri');
            $table->foreign('kk_id')->references('id')->on('kk');
            $table->foreign('prestasi_kode')->references('kode')->on('prestasi');
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('peserta');
    }
}

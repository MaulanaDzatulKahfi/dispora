<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrestasiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prestasi', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('kode')->index();
            $table->string('nim')->nullable();
            $table->float('ipk')->nullable();
            $table->integer('semester')->nullable();
            $table->integer('rangking')->nullable();
            $table->string('lomba')->nullable();
            $table->string('tingkat')->nullable();
            $table->string('lembaga')->nullable();
            $table->integer('hafal')->nullable();
            $table->integer('juz1')->nullable();
            $table->integer('juz2')->nullable();
            $table->enum('jenis', ['akademik', 'non_akademik', 'tahfidz', 'kerelawanan', 'mahasiswa_aktif']);
            $table->string('foto');
            $table->integer('skor');
            $table->unsignedBigInteger('user_id');
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
        Schema::dropIfExists('prestasi');
    }
}

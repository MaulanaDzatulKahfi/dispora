<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJurusanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jurusan', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->BigInteger('fakultas_id')->unsigned()->index();
            $table->BigInteger('perting_id')->unsigned()->index();
            $table->foreign('fakultas_id')->references('id')->on('fakultas');
            $table->foreign('perting_id')->references('id')->on('perting');
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
        Schema::dropIfExists('jurusan');
    }
}

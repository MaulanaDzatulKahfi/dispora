<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePertingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perting', function (Blueprint $table) {

            $table->id();
            $table->string('kode_pt');
            $table->string('name');
            $table->string('status_pt');
            $table->date('tgl_berdiri');
            $table->string('sk_pt');
            $table->date('tgl_sk_pt');
            $table->longText('alamat');
            $table->string('kelurahan');
            $table->string('kecamatan');
            $table->string('kota');
            $table->string('provinsi');
            $table->string('kode_pos');
            $table->string('tlp');
            $table->string('email');
            $table->string('website');
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
        Schema::dropIfExists('products');
    }
}

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
            $table->string('kode_pt')->nullable();
            $table->string('name')->nullable();
            $table->string('status_pt')->nullable();
            $table->date('tgl_berdiri')->nullable();
            $table->string('sk_pt')->nullable();
            $table->date('tgl_sk_pt')->nullable();
            $table->longText('alamat')->nullable();
            $table->string('kelurahan')->nullable();
            $table->string('kecamatan')->nullable();
            $table->string('kota')->nullable();
            $table->string('provinsi')->nullable();
            $table->string('kode_pos')->nullable();
            $table->string('tlp')->nullable();
            $table->string('email')->nullable();
            $table->string('website')->nullable();
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

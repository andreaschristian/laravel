<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BikinTabelBoxoffice extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('boxoffices', function (Blueprint $table) {
            $table->increments('id');
            $table->String('nama_film');
            $table->String('link_download_film');
            $table->String('kualitas');
            $table->String('gambar');
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
        Schema::drop('boxoffices');
    }
}

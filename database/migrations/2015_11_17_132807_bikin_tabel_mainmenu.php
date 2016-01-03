<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BikinTabelMainmenu extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mainmenus', function (Blueprint $table) {
            $table->increments('id_menu');
            $table->String('nama_menu');
            $table->String('link_menu');
            $table->enum('aktif',['Ya','tidak']);
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
        Schema::drop('mainmenus');
    }
}

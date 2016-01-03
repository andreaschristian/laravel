<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BikinTableSubmenu extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('submenus', function (Blueprint $table) {
            $table->increments('id_sub');
            $table->String('nama_sub');
            $table->String('link_sub');
            $table->String('id_main');
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
        Schema::drop('submenus');
    }
}

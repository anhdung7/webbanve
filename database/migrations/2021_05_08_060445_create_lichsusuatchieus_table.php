<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLichsusuatchieusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lichsusuatchieus', function (Blueprint $table) {
            $table->id();
            $table->biginteger('idsuatchieu');
            $table->biginteger('idadmin');
            $table->integer('tinhtrang');
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
        Schema::dropIfExists('lichsusuatchieus');
    }
}

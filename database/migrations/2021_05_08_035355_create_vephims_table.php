<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVephimsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vephims', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('idnguoidung');
            $table->bigInteger('idsuatchieu');
            $table->Integer('giave');
            $table->string('vtghe');
            $table->Integer('tinhtrang');
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
        Schema::dropIfExists('vephims');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Suabangphim extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('phims', function (Blueprint $table) {
            //
            $table->string('noidung');
            $table->string('linktrailer');
        });
        Schema::dropIfExists('lichsuvephims');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('phims', function (Blueprint $table) {
            //
        });
    }
}

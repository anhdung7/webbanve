<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Suabanglsdoi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('lichsudoidiems', function (Blueprint $table) {
            //
            $table->string('idhoadon');
            $table->string('sodiemdoi');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('lichsudoidiems', function (Blueprint $table) {
            //
        });
    }
}

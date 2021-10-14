<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Suabangkm extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('khuyenmais', function (Blueprint $table) {
            //
            $table->timestamp('tgbatdau');
            $table->timestamp('tgketthuc');
            $table->integer('theloai');
            $table->string('idtacdong');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('khuyenmais', function (Blueprint $table) {
            //
        });
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKelurahansTable extends Migration
{
    public function up()
    {
        Schema::create('kelurahans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('kecamatan_id');
            $table->foreign('kecamatan_id', 'kecamatan_fk_4153644')->references('id')->on('kecamatans');
            $table->string('nama');
        });
    }
}

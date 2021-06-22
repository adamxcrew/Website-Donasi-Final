<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProgramBeritaTable extends Migration
{
    public function up()
    {
        Schema::create('program_berita', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('program_donasi_id');
            $table->foreign('program_donasi_id', 'program_donasi_fk_4216948')->references('id')->on('program_donasis');
            $table->longText('berita');
            $table->timestamps();
        });
    }
}

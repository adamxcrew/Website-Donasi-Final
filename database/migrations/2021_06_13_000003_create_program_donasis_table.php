<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProgramDonasisTable extends Migration
{
    public function up()
    {
        Schema::create('program_donasis', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('judul');
            $table->string('deskripsi');
            $table->string('thumbnail')->default(null)->nullable();
            $table->longText('konten');
            $table->integer('target');
            $table->datetime('batas_akhir');
            $table->boolean('status_verifikasi')->default(0)->nullable();
            $table->boolean('status_selesai')->default(0)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}

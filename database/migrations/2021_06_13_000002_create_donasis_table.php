<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDonasisTable extends Migration
{
    public function up()
    {
        Schema::create('donasis', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama_donatur')->nullable();
            $table->string('email_donatur')->nullable();
            $table->string('rekening');
            $table->string('atas_nama');
            $table->integer('nominal');
            $table->longText('pesan')->nullable();
            $table->string('kode_donasi')->nullable();
            $table->string('bukti_donasi')->nullable();
            $table->boolean('status_donasi')->default(0)->nullable();
            $table->boolean('status_verifikasi')->default(0)->nullable();
            $table->timestamps();
        });
    }
}

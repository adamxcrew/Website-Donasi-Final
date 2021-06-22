<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSaransTable extends Migration
{
    public function up()
    {
        Schema::create('sarans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('subjek');
            $table->string('pengirim')->nullable();
            $table->string('email')->nullable();
            $table->longText('isi');
            $table->timestamps();
        });
    }
}

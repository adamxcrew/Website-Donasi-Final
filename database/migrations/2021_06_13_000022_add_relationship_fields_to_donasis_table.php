<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToDonasisTable extends Migration
{
    public function up()
    {
        Schema::table('donasis', function (Blueprint $table) {
            $table->unsignedBigInteger('program_donasi_id');
            $table->foreign('program_donasi_id', 'program_donasi_fk_4153838')->references('id')->on('program_donasis');
        });
    }
}

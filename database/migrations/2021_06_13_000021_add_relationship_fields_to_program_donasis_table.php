<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToProgramDonasisTable extends Migration
{
    public function up()
    {
        Schema::table('program_donasis', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id', 'user_fk_4153789')->references('id')->on('users');
            $table->unsignedBigInteger('rekening_id');
            $table->foreign('rekening_id', 'rekening_fk_4153790')->references('id')->on('rekenings');
        });
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToRekeningsTable extends Migration
{
    public function up()
    {
        Schema::table('rekenings', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id', 'user_fk_4153776')->references('id')->on('users');
            $table->unsignedBigInteger('bank_id');
            $table->foreign('bank_id', 'bank_fk_4153777')->references('id')->on('banks');
        });
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToUsersTable extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->unsignedBigInteger('provinsi_id')->nullable();
            $table->foreign('provinsi_id', 'provinsi_fk_4153667')->references('id')->on('provinsis');
            $table->unsignedBigInteger('kabupaten_id')->nullable();
            $table->foreign('kabupaten_id', 'kabupaten_fk_4153668')->references('id')->on('kabupatens');
            $table->unsignedBigInteger('kecamatan_id')->nullable();
            $table->foreign('kecamatan_id', 'kecamatan_fk_4153669')->references('id')->on('kecamatans');
            $table->unsignedBigInteger('kelurahan_id')->nullable();
            $table->foreign('kelurahan_id', 'kelurahan_fk_4153670')->references('id')->on('kelurahans');
            $table->unsignedBigInteger('agama_id')->nullable();
            $table->foreign('agama_id', 'agama_fk_4153671')->references('id')->on('agamas');
            $table->unsignedBigInteger('profesi_id')->nullable();
            $table->foreign('profesi_id', 'profesi_fk_4153672')->references('id')->on('profesis');
        });
    }
}

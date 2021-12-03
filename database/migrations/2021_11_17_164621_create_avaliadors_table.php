<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAvaliadorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('avaliadors', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('endereco');
            $table->string('email');
            $table->bigInteger('telefone');
            $table->unsignedBigInteger('pais_origem');
            $table->unsignedBigInteger('area_pref');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();


            $table->foreign('area_pref')->references('id')->on('areas');
            $table->foreign('pais_origem')->references('id')->on('paises');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('avaliadors');
    }
}

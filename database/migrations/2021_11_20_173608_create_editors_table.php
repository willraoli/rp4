<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEditorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('editors', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('endereco');
            $table->string('email');
            $table->bigInteger('telefone');
            // $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('pais_id');
            $table->unsignedBigInteger('area_id');
            $table->date('dataContratacao');
            $table->date('dataDemissao');
            $table->timestamps();

            $table->foreign('area_id')->references('id')->on('areas');
            $table->foreign('pais_id')->references('id')->on('paises');
            // $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('editors');
    }
}

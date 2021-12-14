<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Submissao extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Submissao', function (Blueprint $table) {
            $table->id();
            $table->boolean('finalizado');
            $table->bigInteger('autor_id')->unique();
            $table->bigInteger('revista_id')->unsigned();
            $table->timestamps();
            
            $table->foreign('autor_id')->references('id')->on('autors')->onDelete('cascade');
            $table->foreign('revista_id')->references('id')->on('revistas')->onDelete('cascade');
        });
    }




    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Submissao');
    }
}

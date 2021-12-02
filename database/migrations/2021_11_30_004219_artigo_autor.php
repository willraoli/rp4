<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ArtigoAutor extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ArtigoAutor', function (Blueprint $table) {

            $table->integer('artigo_id')->unsigned();        
            $table->integer('autor_id')->unsigned();
            
            $table->foreign('artigo_id')->references('id')->on('artigos')->onDelete('cascade');
            $table->foreign('autor_id')->references('id')->on('autors')->onDelete('cascade');
        
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ArtigoAutor');
    }
}

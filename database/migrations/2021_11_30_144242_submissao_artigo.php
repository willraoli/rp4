<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SubmissaoArtigo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('SubmissaoArtigo', function (Blueprint $table) {
            $table->integer('submissao_id')->unsigned();        
            $table->integer('artigo_id')->unsigned();
            
            $table->foreign('submissao_id')->references('id')->on('submissao');
            $table->foreign('artigo_id')->references('id')->on('artigos');
        
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('SubmissaoArtigo');
    }
}

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
            $table->integer('revista_id')->unsigned();
            $table->timestamps();
            
            $table->foreign('revista_id')->references('id')->on('revistas');        
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

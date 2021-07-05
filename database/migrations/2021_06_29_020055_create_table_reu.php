<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableReu extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reu', function (Blueprint $table) {
            $table->bigIncrements('id');
            
            $table->string("nome");
            $table->bigInteger('processo_id')->nullable()->unsigned();

            $table->foreign('processo_id')
                ->references('id')->on('processos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reu');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableProcesso extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('processos', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string("num_processo");
            //$table->string("autor");
            $table->string("local");
            //$table->string("reu");
            $table->string("origem")->nullable();
            $table->string("justica_gratuita")->nullable();
            $table->string("estado_processo")->nullable();
            $table->string("cidade_processo")->nullable();
            $table->string("vara")->nullable();

            $table->text("peticao_inicial")->nullable();
            $table->text("contestacao")->nullable();
            $table->text("resumo")->nullable();

            $table->datetime("ajuizamento")->nullable();
            $table->datetime("citacao")->nullable();

            $table->bigInteger('objeto_id')->nullable()->unsigned();
            $table->string("status")->nullable();

            $table->foreign('objeto_id')
                ->references('id')->on('objetos');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('processos');
    }
}

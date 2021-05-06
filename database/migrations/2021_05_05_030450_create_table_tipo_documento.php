<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableTipoDocumento extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipo_documentos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string("tipo");
            $table->text("texto");
            $table->bigInteger("tag_id")->unsigned()->nullable();
            $table->timestamps();

            $table->foreign('tag_id')
                ->references('id')->on('tag')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tipo_documentos');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableAcesso extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('acesso', function (Blueprint $table) {
            $table->bigInteger('url_id')->unsigned();
            $table->bigInteger('perfil_id')->unsigned();

            $table->foreign('perfil_id')
                ->references('id')->on('perfil')
                ->onDelete('cascade');

            $table->foreign('url_id')
                ->references('id')->on('url')
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
        Schema::dropIfExists('acesso');
    }
}

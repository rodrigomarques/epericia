<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateForgetPasswordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('forget_password', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string("email");
            $table->string("hash");
            $table->integer("status");
            $table->dateTime("dt_validate");

            $table->bigInteger('usuario_id')->unsigned();
            $table->timestamps();

            /*$table->foreign('url_id')
                ->references('id')->on('url')
                ->onDelete('cascade');*/
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('forget_password');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEstadoDocumentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estado_documentos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome');

            $table->integer('utilizador_id')->unsigned();
            $table->foreign('utilizador_id')->references('id')->on('utilizadores');

            $table->integer('documento_id')->unsigned();
            $table->foreign('documento_id')->references('id')->on('documentos');

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
        Schema::dropIfExists('estado_documentos');
    }
}

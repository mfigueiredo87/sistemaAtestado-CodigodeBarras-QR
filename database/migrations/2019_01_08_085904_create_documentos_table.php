<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocumentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documentos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome');
            $table->string('codValidacao')->unique();
            $table->string('estado_civil');
            $table->string('data_nascimento');
            $table->string('nome_pai');
            $table->string('nome_mae');
            $table->string('naturalidade');
            $table->string('provincia');
            $table->string('bilhete')->unique();
            $table->string('data_emissao');
            $table->string('bairro');
            $table->string('rua');
            $table->string('casa');
            $table->string('residente');
            $table->string('validade_documento');

            $table->integer('efeito_id')->unsigned();
            $table->foreign('efeito_id')->references('id')->on('efeitos');

            $table->integer('tipo_id')->unsigned();
            $table->foreign('tipo_id')->references('id')->on('servicos');

            $table->integer('direcao_id')->unsigned();
            $table->foreign('direcao_id')->references('id')->on('direcaos');

            $table->integer('utilizador_id')->unsigned();
            $table->foreign('utilizador_id')->references('id')->on('users');
            
              $table->softDeletes();
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
        Schema::dropIfExists('documentos');
    }
}

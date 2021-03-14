<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDirecaosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('direcaos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome');
            $table->string('bilhete')->unique();
            $table->string('email');
            $table->string('telefone');
            $table->string('estado');
            $table->softDeletes();//deixa o campo marcado com a data de deleted at e assim fica invisivel na view
            $table->integer('cargo_id')->unsigned()->index();
            $table->foreign('cargo_id')->references('id')->on('cargos')->onDelete('cascade');//
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
        Schema::dropIfExists('direcaos');
    }
}

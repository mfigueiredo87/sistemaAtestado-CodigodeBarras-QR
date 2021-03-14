<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustoServicosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('custo_servicos', function (Blueprint $table) {
            $table->increments('id');
            //relacionamento com a tabela servico
            $table->integer('servico_id')->unsigned();
            $table->foreign('servico_id')->references('id')->on('servicos'); 
            // relacionamento com a tabela custo
            $table->integer('custo_id')->unsigned();
            $table->foreign('custo_id')->references('id')->on('custos');
            
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
        Schema::dropIfExists('custo_servicos');
    }
}

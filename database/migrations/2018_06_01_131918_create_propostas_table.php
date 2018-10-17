<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePropostasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('propostas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome', 40);
            $table->integer('carro_id')->unsigned();

            // define uma chave estrangeira que se relaciona com marcas
            $table->foreign('carro_id')
                  ->references('id')->on('carros')
                  ->onDelete('restrict');            

            $table->string('email', 30);
            $table->string('telefone', 20);
            $table->decimal('proposta', 10, 2);
                  
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
        Schema::dropIfExists('propostas');
    }
}

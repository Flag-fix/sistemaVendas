<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVendasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendas', function (Blueprint $table) {
            $table->id();
            $table->integer("qtd");
            $table->date('data-venda');
            $table->unsignedBigInteger('vendedor_id');
            $table->foreign('vendedor_id')->references('id')->on('vendedor');
            $table->unsignedBigInteger('produto_id');
            $table->foreign('produto_id')->references('id')->on('produto');
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
        Schema::dropIfExists('vendas');
    }
}

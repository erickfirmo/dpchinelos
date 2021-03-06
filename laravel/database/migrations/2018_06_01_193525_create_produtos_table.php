<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProdutosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produtos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome', 30);
            $table->text('descricao')->nullable();
            $table->integer('unidades');
            $table->float('preco', 8, 2);
            $table->integer('unidades_lote')->nullable();
            $table->float('preco_lote', 8, 2)->nullable();
            $table->string('imagem_principal')->nullable();
            $table->string('imagem_2')->nullable();
            $table->string('imagem_3')->nullable();
            $table->unsignedInteger('categoria_id');
            $table->unsignedInteger('status_id');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('categoria_id')
                ->references('id')
                ->on('categorias')
                ->onDelete('cascade');
                
            $table->foreign('status_id')
                ->references('id')
                ->on('status')
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
        Schema::dropIfExists('produtos');
    }
}

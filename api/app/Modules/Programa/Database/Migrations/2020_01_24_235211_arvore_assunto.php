<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ArvoreAssunto extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rl_arvore_assunto', function (Blueprint $table) {
            $table->integerIncrements('id_arvore_assunto');
            $table->unsignedInteger('id_assunto_pai');
            $table->foreign('id_assunto_pai')
                ->references('id_assunto')->on('tb_assunto');
            $table->unsignedInteger('id_assunto_filho');
            $table->foreign('id_assunto_filho')
                ->references('id_assunto')->on('tb_assunto');

            $table->unique('id_assunto_filho');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rl_arvore_assunto');
    }
}

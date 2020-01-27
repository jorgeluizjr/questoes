<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Questao extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_questao', function (Blueprint $table) {
            $table->integerIncrements('id_questao');
            $table->string('no_questao', 5000);
            $table->unsignedInteger('id_orgao');
            $table->foreign('id_orgao')
                ->references('id_orgao')->on('tb_orgao');
            $table->unsignedInteger('id_banca');
            $table->foreign('id_banca')
                ->references('id_banca')->on('tb_banca');
            $table->unsignedInteger('id_assunto');
            $table->foreign('id_assunto')
                ->references('id_assunto')->on('tb_assunto');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_questao');
    }
}

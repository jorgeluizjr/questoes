<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Orgao extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_orgao', function (Blueprint $table) {
            $table->integerIncrements('id_orgao');
            $table->string('no_orgao', 255)->nullable();
            $table->string('sg_orgao', 10);
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
        Schema::dropIfExists('tb_orgao');
    }
}

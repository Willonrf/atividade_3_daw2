<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJogadorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jogadors', function (Blueprint $table) {
            $table->id();
            $table->string('NOME',100);
            $table->date('DATA_NASCIMENTO');
            $table->boolean('POSSUI');
            $table->bigInteger("ID_CLUBE")->unsigned();
            $table->foreign("ID_CLUBE")->references("id")->on("clubes");
            $table->bigInteger("ID_POSICAO")->unsigned();
            $table->foreign("ID_POSICAO")->references("id")->on("posicaos");
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
        Schema::dropIfExists('jogadors');
    }
}
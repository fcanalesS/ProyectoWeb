<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHorariosTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('horarios', function (Blueprint $table)
        {
            $table->bigIncrements('id');
            $table->date('fecha')->unique();
            $table->bigInteger('sala_id')->unique();
            $table->bigInteger('periodo_id')->unique();
            $table->bigInteger('curso_id');

            $table->foreign('sala_id')->references('id')->on('salas')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('periodo_id')->references('id')->on('periodos')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('curso_id')->references('id')->on('cursos')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('horarios');
    }

}

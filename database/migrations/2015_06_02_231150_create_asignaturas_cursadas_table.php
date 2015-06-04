<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAsignaturasCursadasTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asignaturas_cursadas', function(Blueprint $table)
        {
            $table->bigIncrements('id');
            $table->bigInteger('curso_id')->unique();
            $table->bigInteger('estudiante_id')->unique();
            $table->timestamps();

            $table->foreign('curso_id')->references('id')->on('cursos')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('estudiante_id')->references('id')->on('estudiantes')->onUpdate('cascade')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('asignaturas_cursadas');
    }

}

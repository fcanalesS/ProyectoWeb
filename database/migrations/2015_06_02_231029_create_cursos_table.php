<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCursosTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cursos', function(Blueprint $table)
        {
            $table->bigIncrements('id');
            $table->bigInteger('asignatura_id')->unique();
            $table->integer('docente_id')->unique();
            $table->integer('semestre')->unique();
            $table->integer('anio')->unique();
            $table->integer('seccion')->unique();
            $table->timestamps();

            $table->foreign('asignatura_id')->references('id')->on('asignaturas')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('docente_id')->references('id')->on('docentes')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('cursos');
    }

}

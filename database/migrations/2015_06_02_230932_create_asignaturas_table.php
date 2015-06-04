<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAsignaturasTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asignaturas', function(Blueprint $table)
        {
            $table->bigIncrements('id');
            $table->integer('departamento_id');
            $table->string('codigo', 255)->unique();
            $table->string('nombre', 255);
            $table->text('descripcion');
            $table->timestamps();

            $table->foreign('departamento_id')->references('id')->on('departamentos')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('asignaturas');
    }

}

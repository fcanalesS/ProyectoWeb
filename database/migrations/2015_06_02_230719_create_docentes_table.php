<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocentesTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('docentes', function (Blueprint $table)
        {
            $table->increments('id');
            $table->integer('departamento_id');
            $table->integer('rut')->unique();
            $table->string('nombres', 255);
            $table->string('apellidos', 255);
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
        Schema::drop('docentes');
    }

}

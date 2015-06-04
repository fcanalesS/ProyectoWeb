<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEscuelasTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('escuelas', function (Blueprint $table)
        {
            $table->increments('id');
            $table->string('nombre')->unique();
            $table->integer('departamento_id')->unique();
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
        Schema::drop('escuelas');
    }

}

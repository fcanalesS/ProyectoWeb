<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarrerasTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carreras', function (Blueprint $table){
            $table->increments('id');
            $table->integer('escuela_id');
            $table->integer('codigo')->unique();
            $table->string('nombre')->unique();
            $table->text('descripcion');
            $table->timestamps();

            $table->foreign('escuela_id')->references('id')->on('escuelas')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('carreras');
    }

}

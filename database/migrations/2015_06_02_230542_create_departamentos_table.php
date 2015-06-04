<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDepartamentosTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('departamentos', function (Blueprint $table)
        {
            $table->increments('id');
            $table->string('nombre', 255)->unique();
            $table->integer('facultad_id')->unique();
            $table->text('descripcion');
            $table->timestamps();

            $table->foreign('facultad_id')->references('id')->on('facultades')->onUpdate('cascade')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('departamentos');
    }

}

<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCampusTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('campus', function (Blueprint $table)
        {
            $table->increments('id');
            $table->string('nombre', 255)->unique();
            $table->string('direccion', 255);
            $table->double('latitud', 2, 7)->unique();
            $table->double('longitud', 2, 7)->unique();
            $table->text('descripcion');
            $table->integer('rut_encargado');
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
        Schema::drop('campus');
    }

}

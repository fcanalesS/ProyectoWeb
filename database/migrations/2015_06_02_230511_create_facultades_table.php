<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFacultadesTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facultades', function (Blueprint $table)
        {
            $table->increments('id');
            $table->string('nombre', 255)->unique();
            $table->integer('campus_id');
            $table->text('descripcion');
            $table->timestamps();

            $table->foreign('campus_id')->references('id')->on('campus')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('facultades');
    }

}

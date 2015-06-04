<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalasTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('salas', function (Blueprint $table)
        {
            $table->bigIncrements('id');
            $table->integer('campus_id');
            $table->integer('tipo_sala_id')->unique();
            $table->string('nombre', 255)->unique();
            $table->text('descripcion');
            $table->timestamps();

            $table->foreign('campus_id')->references('id')->on('campus')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('tipo_sala_id')->references('id')->on('tipos_salas')->onUpdate('cascade')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('salas');
    }

}

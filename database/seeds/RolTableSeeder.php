<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;


class RolTableSeeder extends Seeder{

    public function run ()
    {
        $faker = Faker::create();

        for($i=0; $i<4; $i++)
        {
            \DB::table('roles')->insertGetId( array(
                'nombre'        =>  $faker->unique()->randomElement(
                                        ['Administrador', 'Encargado campus', 'Estudiante', 'Docente']),
                'descripcion'   =>  $faker->sentence(6),
                'created_at'    =>  \DB::raw('NOW()'),
                'updated_at'    =>  \DB::raw('NOW()')
            ));
        }
    }

}
<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;


class RolTableSeeder extends Seeder{

    public function run ()
    {
        $faker = Faker::create();

        for($i=0; $i<4; $i++)
        {
            $id = \DB::table('roles')->insertGetId( array(
                'nombre'        =>  $faker->unique()->randomElement(
                                        ['Administrador', 'Encargado campus', 'Estudiante', 'Docente']),
                'descripcion'   =>  $faker->sentence(6),
                'created_at'    =>  \DB::raw('NOW()'),
                'updated_at'    =>  \DB::raw('NOW()')
            ));

            \DB::table('roles_usuarios')->insert( array(
                'rut'           =>  $faker->unique()->ean8,
                'rol_id'        =>  $id,
                'created_at'    =>  \DB::raw('NOW()'),
                'updated_at'    =>  \DB::raw('NOW()')
            ));
        }
    }

}
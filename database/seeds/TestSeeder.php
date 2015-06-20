<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class TestSeeder extends Seeder{

    public function run ()
    {
        $faker = Faker::create();

        \DB::table('roles_usuarios')->insert(array(
            'rut'           =>  16967863,
            'rol_id'        =>  4,
            'created_at'    =>  \DB::raw('NOW()'),
            'updated_at'    =>  \DB::raw('NOW()')
        ));
        \DB::table('roles_usuarios')->insert(array(
            'rut'           =>  17473293,
            'rol_id'        =>  4,
            'created_at'    =>  \DB::raw('NOW()'),
            'updated_at'    =>  \DB::raw('NOW()')
        ));
        \DB::table('roles_usuarios')->insert(array(
            'rut'           =>  17473293,
            'rol_id'        =>  3,
            'created_at'    =>  \DB::raw('NOW()'),
            'updated_at'    =>  \DB::raw('NOW()')
        ));

        for( $i = 0; $i < 15; $i++)
        {
            \DB::table('roles_usuarios')->insert(array(
                'rut'           =>  $faker->unique()->ean8,
                'rol_id'        =>  $faker->numberBetween(1, 4),
                'created_at'    =>  \DB::raw('NOW()'),
                'updated_at'    =>  \DB::raw('NOW()')
            ));
        }


        \DB::table('estudiantes')->insert(array(
            'departamento_id'   =>  1,
            'rut'               =>  16967863,
            'nombres'           =>  'Felipe Sebastian',
            'apellidos'         =>  'Canales Saavedra',
            'email'             =>  'f.canales.27@gmail.com',
            'created_at'        =>  \DB::raw('NOW()'),
            'updated_at'        =>  \DB::raw('NOW()')
        ));

    }

}
<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class TestSeeder extends Seeder{

    public function run ()
    {
        $faker = Faker::create();

        \DB::table('roles_usuarios')->insert(array(
            'rut'           =>  16967863,
            'rol_id'        =>  1,
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



        /*
        \DB::table('funcionarios')->insert(array(
            'departamento_id'   =>  1,
            'rut'               =>  16967863,
            'nombres'           =>  'Felipe Sebastian',
            'apellidos'         =>  'Canales Saavedra',
            'created_at'        =>  \DB::raw('NOW()'),
            'updated_at'        =>  \DB::raw('NOW()')
        ));
        */
    }

}
<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class PeriodosTableSeeder extends Seeder {

    public function run()
    {
        $faker = Faker::create();

        \DB::table('periodos')->insert( array(
            'bloque'        =>  'I',
            'inicio'        =>  '08:00:00',
            'fin'           =>  '09:30:00',
            'created_at'    =>  \DB::raw('NOW()'),
            'updated_at'    =>  \DB::raw('NOW()')
        ));

        \DB::table('periodos')->insert( array(
            'bloque'        =>  'II',
            'inicio'        =>  '09:40:00',
            'fin'           =>  '11:10:00',
            'created_at'    =>  \DB::raw('NOW()'),
            'updated_at'    =>  \DB::raw('NOW()')
        ));

        \DB::table('periodos')->insert( array(
            'bloque'        =>  'III',
            'inicio'        =>  '11:20:00',
            'fin'           =>  '12:50:00',
            'created_at'    =>  \DB::raw('NOW()'),
            'updated_at'    =>  \DB::raw('NOW()')
        ));

        \DB::table('periodos')->insert( array(
            'bloque'        =>  'IV',
            'inicio'        =>  '13:00:00',
            'fin'           =>  '14:30:00',
            'created_at'    =>  \DB::raw('NOW()'),
            'updated_at'    =>  \DB::raw('NOW()')
        ));

        \DB::table('periodos')->insert( array(
            'bloque'        =>  'V',
            'inicio'        =>  '14:40:00',
            'fin'           =>  '16:10:00',
            'created_at'    =>  \DB::raw('NOW()'),
            'updated_at'    =>  \DB::raw('NOW()')
        ));

        \DB::table('periodos')->insert( array(
            'bloque'        =>  'VI',
            'inicio'        =>  '16:20:00',
            'fin'           =>  '17:50:00',
            'created_at'    =>  \DB::raw('NOW()'),
            'updated_at'    =>  \DB::raw('NOW()')
        ));

        \DB::table('periodos')->insert( array(
            'bloque'        =>  'VII',
            'inicio'        =>  '18:00:00',
            'fin'           =>  '19:30:00',
            'created_at'    =>  \DB::raw('NOW()'),
            'updated_at'    =>  \DB::raw('NOW()')
        ));

        \DB::table('periodos')->insert( array(
            'bloque'        =>  'VIII',
            'inicio'        =>  '19:00:00',
            'fin'           =>  '20:30:00',
            'created_at'    =>  \DB::raw('NOW()'),
            'updated_at'    =>  \DB::raw('NOW()')
        ));

        \DB::table('periodos')->insert( array(
            'bloque'        =>  'XI',
            'inicio'        =>  '20:40:00',
            'fin'           =>  '22:10:00',
            'created_at'    =>  \DB::raw('NOW()'),
            'updated_at'    =>  \DB::raw('NOW()')
        ));

    }
}
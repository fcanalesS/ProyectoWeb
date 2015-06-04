<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class PeriodosTableSeeder extends Seeder {

    public function run()
    {
        $faker = Faker::create();

        for($i=0; $i<8; $i++)
        {
            \DB::table('periodos')->insert( array(
                'bloque'        =>  $faker->unique()->randomElement(['I', 'II', 'III', 'IV', 'V', 'VI', 'VII', 'VIII'], 1),
                'inicio'        =>  $faker->time('H:i:s', 'now'),
                'fin'           =>  $faker->time('H:i:s', 'now'),
                'created_at'    =>  \DB::raw('NOW()'),
                'updated_at'    =>  \DB::raw('NOW()')
            ));
        }
    }
}
<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class CampusTableSeeder extends Seeder{

    public function run ()
    {
        $faker = Faker::create();

        for($i=1; $i<=8; $i++)
        {
            $campus_id = \DB::table('campus')->insertGetId(array(
                'nombre'        =>  $faker->unique()->name(),
                'direccion'     =>  $faker->address,
                'latitud'       =>  $faker->latitude,
                'longitud'      =>  $faker->longitude,
                'descripcion'   =>  $faker->sentence(6),
                'rut_encargado' =>  $faker->ean8,
                'created_at'    =>  \DB::raw('NOW()'),
                'updated_at'    =>  \DB::raw('NOW()')
            ));

            $facultad_id = \DB::table('facultades')->insertGetId(array(
                'nombre'        =>  $faker->unique()->company,
                'campus_id'     =>  $campus_id,
                'descripcion'   =>  $faker->sentence(6),
                'created_at'    =>  \DB::raw('NOW()'),
                'updated_at'    =>  \DB::raw('NOW()')
            ));

            $departamento_id = \DB::table('departamentos')->insertGetID(array(
                'nombre'        =>  $faker->streetName,
                'facultad_id'   =>  $facultad_id,
                'descripcion'   =>  $faker->sentence(6),
                'created_at'    =>  \DB::raw('NOW()'),
                'updated_at'    =>  \DB::raw('NOW()')
            ));

            $escuela_id = \DB::table('escuelas')->insertGetID(array(
                'nombre'            =>  $faker->streetName,
                'departamento_id'   =>  $departamento_id,
                'descripcion'       =>  $faker->sentence(6),
                'created_at'        =>  \DB::raw('NOW()'),
                'updated_at'        =>  \DB::raw('NOW()')
            ));

            $carrera_id = \DB::table('carreras')->insertGetID(array(
                'escuela_id'        =>  $escuela_id,
                'codigo'            =>  $faker->unique()->numberBetween(10000, 99999),
                'nombre'            =>  $faker->unique()->domainWord,
                'descripcion'       =>  $faker->sentence(6),
                'created_at'        =>  \DB::raw('NOW()'),
                'updated_at'        =>  \DB::raw('NOW()')
            ));

            $rut_f = $faker->unique()->ean8;

            \DB::table('funcionarios')->insertGetID(array(
                'departamento_id'   =>  $departamento_id,
                'rut'               =>  $rut_f,
                'nombres'           =>  $faker->firstName . ' ' . $faker->name,
                'apellidos'         =>  $faker->lastName . ' ' . $faker->lastName,
                'created_at'        =>  \DB::raw('NOW()'),
                'updated_at'        =>  \DB::raw('NOW()')
            ));
            //******
            \DB::table('roles_usuarios')->insert(array(
                'rut'       =>  $rut_f,
                'rol_id'    =>  $faker->numberBetween(1, 4)
            ));
            //******

            $rut_d = $faker->unique()->ean8;
            $docente_id = \DB::table('docentes')->insertGetID(array(
                'departamento_id'   =>  $departamento_id,
                'rut'               =>  $rut_d,
                'nombres'           =>  $faker->firstName . ' ' . $faker->name,
                'apellidos'         =>  $faker->lastName . ' ' . $faker->lastName,
                'created_at'        =>  \DB::raw('NOW()'),
                'updated_at'        =>  \DB::raw('NOW()')
            ));
            //******
            \DB::table('roles_usuarios')->insert(array(
                'rut'       =>  $rut_d,
                'rol_id'    =>  $faker->numberBetween(1, 4)
            ));
            //******

            $rut_e = $faker->unique()->ean8;
            $estudiante_id = \DB::table('estudiantes')->insertGetID(array(
                'carrera_id'        =>  $carrera_id,
                'rut'               =>  $rut_e,
                'nombres'           =>  $faker->firstName . ' ' . $faker->name,
                'apellidos'         =>  $faker->lastName . ' ' . $faker->lastName,
                'email'             =>  $faker->email,
                'created_at'        =>  \DB::raw('NOW()'),
                'updated_at'        =>  \DB::raw('NOW()')
            ));
            //******
            \DB::table('roles_usuarios')->insert(array(
                'rut'       =>  $rut_e,
                'rol_id'    =>  $faker->numberBetween(1, 4)
            ));
            //******

            $tipo_sala_id = \DB::table('tipos_salas')->insertGetID(array(
                'nombre'            =>  $faker->unique()->company,
                'descripcion'       =>  $faker->sentence(6),
                'created_at'        =>  \DB::raw('NOW()'),
                'updated_at'        =>  \DB::raw('NOW()')
            ));

            $sala_id = \DB::table('salas')->insertGetID(array(
                'campus_id'         =>  $campus_id,
                'tipo_sala_id'      =>  $tipo_sala_id,
                'nombre'            =>  $faker->unique()->name,
                'descripcion'       =>  $faker->sentence(6),
                'created_at'        =>  \DB::raw('NOW()'),
                'updated_at'        =>  \DB::raw('NOW()')
            ));

            $asignatura_id = \DB::table('asignaturas')->insertGetID(array(
                'departamento_id'   =>  $departamento_id,
                'codigo'            =>  $faker->unique()->lexify('???') . '-' . $faker->unique()->numerify('####'),
                'nombre'            =>  $faker->word,
                'descripcion'       =>  $faker->sentence(6),
                'created_at'        =>  \DB::raw('NOW()'),
                'updated_at'        =>  \DB::raw('NOW()')
            ));

            $curso_id = \DB::table('cursos')->insertGetID(array(
                'asignatura_id'     =>  $asignatura_id,
                'docente_id'        =>  $docente_id,
                'semestre'          =>  $faker->unique()->numerify('##'),
                'anio'              =>  $faker->unique()->year('now'),
                'seccion'           =>  $faker->unique()->numerify('##'),
                'created_at'        =>  \DB::raw('NOW()'),
                'updated_at'        =>  \DB::raw('NOW()')
            ));

            \DB::table('asignaturas_cursadas')->insert(array(
                'curso_id'      =>  $curso_id,
                'estudiante_id' =>  $estudiante_id,
                'created_at'        =>  \DB::raw('NOW()'),
                'updated_at'        =>  \DB::raw('NOW()')
            ));

            \DB::table('horarios')->insert(array(
                'fecha'         =>  $faker->date('Y-m-d', 'now'),
                'sala_id'       =>  $sala_id,
                'periodo_id'    =>  $i,
                'curso_id'      =>  $curso_id
            ));
        }
    }

}
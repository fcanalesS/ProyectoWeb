<?php namespace App\Http\Controllers\Estudiante;

use App\Helpers\PersonasUtils;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class EstudianteController extends Controller {

	public function index ($rut)
    {
        $estudiante = \DB::table('estudiantes')
            ->join('carreras', 'estudiantes.carrera_id', '=', 'carreras.id')
            ->join('escuelas', 'carreras.escuela_id', '=', 'escuelas.id')
            ->join('departamentos', 'escuelas.departamento_id', '=', 'departamentos.id')
            ->join('facultades', 'departamentos.facultad_id', '=', 'facultades.id')
            ->join('campus', 'facultades.campus_id', '=', 'campus.id')
            ->where('estudiantes.rut', $rut)
            ->select('estudiantes.id', 'estudiantes.nombres', 'estudiantes.apellidos', 'estudiantes.rut', 'estudiantes.email',
                'carreras.codigo as cod', 'carreras.nombre as carrera', 'escuelas.nombre as escuela',
                'departamentos.nombre as depto', 'facultades.nombre as facultad', 'campus.nombre as campus',
                'campus.latitud', 'campus.longitud', 'campus.direccion')
            ->get();

        /*$this->ac = \DB::table('asignaturas_cursadas')
            ->join('estudiantes', 'asignaturas_cursadas.estudiante_id', '=', 'estudiantes.id')
            ->join('cursos', 'asignaturas_cursadas.curso_id', '=', 'cursos.id')
            ->join('asignaturas', 'cursos.asignatura_id', '=', 'asignaturas.id')
            ->join('docentes', 'cursos.docente_id', '=', 'docentes.id')
            ->join('horarios', 'horarios.curso_id', '=', 'cursos.id')
            ->join('periodos', 'horarios.periodo_id', '=', 'periodos.id')->orderBy('periodos.bloque')
            ->join('salas', 'horarios.sala_id', '=', 'salas.id')
            ->join('tipos_salas', 'salas.tipo_sala_id', '=', 'tipos_salas.id')
            ->select('periodos.bloque', 'periodos.inicio', 'periodos.fin', 'salas.nombre as sala',
                'tipos_salas.nombre as tipo_sala', 'cursos.semestre', 'cursos.anio', 'cursos.seccion', 'docentes.nombres as d_nombres',
                'docentes.apellidos as d_apellidos', 'asignaturas.codigo as cod', 'asignaturas.nombre as asig')
            ->where('estudiantes.id', 1)
            ->get();*/

        $nombres = PersonasUtils::separaNombres($estudiante[0]->nombres);
        $apellidos = PersonasUtils::separaApellidos($estudiante[0]->apellidos);

        return view('estudiante.index', compact('rut', 'estudiante', 'nombres', 'apellidos'));
    }

    public function horarioEstudiante ($rut)
    {
        $horario = \DB::table('asignaturas_cursadas')
            ->join('estudiantes', 'asignaturas_cursadas.estudiante_id', '=', 'estudiantes.id')
            ->join('cursos', 'asignaturas_cursadas.curso_id', '=', 'cursos.id')
            ->join('asignaturas', 'cursos.asignatura_id', '=', 'asignaturas.id')
            ->join('docentes', 'cursos.docente_id', '=', 'docentes.id')
            ->join('horarios', 'horarios.curso_id', '=', 'cursos.id')
            ->join('periodos', 'horarios.periodo_id', '=', 'periodos.id')->orderBy('periodos.bloque')
            ->join('salas', 'horarios.sala_id', '=', 'salas.id')
            ->join('tipos_salas', 'salas.tipo_sala_id', '=', 'tipos_salas.id')
            ->select('periodos.bloque', 'periodos.inicio', 'periodos.fin', 'salas.nombre as sala',
                'tipos_salas.nombre as tipo_sala', 'cursos.semestre', 'cursos.anio', 'cursos.seccion', 'docentes.nombres as d_nombres',
                'docentes.apellidos as d_apellidos', 'asignaturas.codigo as cod', 'asignaturas.nombre as asig')
            ->where('estudiantes.id', 1)
            ->get();

        return view('estudiante.horario', compact('rut', 'horario'));
    }

    public function consultaEstudiante ($rut, $id)
    {


        return view('estudiante.consulta', compact('rut'));
    }

}

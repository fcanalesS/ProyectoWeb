<?php namespace App\Http\Controllers\Estudiante;

use App\AsignaturaCursada;
use App\Campus;
use App\Docente;
use App\Estudiante;
use App\Funcionario;
use App\Helpers\PersonasUtils;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Periodo;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class EstudianteController extends Controller {

    protected $datos;
    /**
     * @var Guard
     */
    private $guard;

    public function __construct(Guard $guard)
    {
        $this->guard = $guard;
        if ($this->guard->check())
        {
            if(Docente::all()->where('rut', $this->guard->user()->rut))
                $this->datos = Docente::select('id', 'rut', 'nombres', 'apellidos')->where('rut', $this->guard->user()->rut)->get();
            elseif(Funcionario::all()->where('rut', $this->guard->user()->rut))
                $this->datos = Funcionario::select('id', 'rut', 'nombres', 'apellidos')->where('rut', $this->guard->user()->rut)->get();
            else
                $this->datos = Estudiante::select('id', 'rut', 'nombres', 'apellidos')->where('rut', $this->guard->user()->rut)->get();
        }
    }

	public function index ()
    {
        $datos = $this->datos;

        $estudiante = \DB::table('estudiantes')
            ->join('carreras', 'estudiantes.carrera_id', '=', 'carreras.id')
            ->join('escuelas', 'carreras.escuela_id', '=', 'escuelas.id')
            ->join('departamentos', 'escuelas.departamento_id', '=', 'departamentos.id')
            ->join('facultades', 'departamentos.facultad_id', '=', 'facultades.id')
            ->join('campus', 'facultades.campus_id', '=', 'campus.id')
            ->where('estudiantes.rut', Auth::user()->rut)
            ->select('estudiantes.id', 'estudiantes.nombres', 'estudiantes.apellidos', 'estudiantes.rut', 'estudiantes.email',
                'carreras.codigo as cod', 'carreras.nombre as carrera', 'escuelas.nombre as escuela',
                'departamentos.nombre as depto', 'facultades.nombre as facultad', 'campus.nombre as campus',
                'campus.latitud', 'campus.longitud', 'campus.direccion')
            ->get();

        return view('estudiante.index', compact('rut', 'estudiante', 'datos'));
    }

    public function horarioEstudiante ()
    {
        $datos = $this->datos;


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
            ->where('estudiantes.rut', $this->guard->user()->rut)
            ->get();


        $campus = Campus::lists('nombre', 'id');
        $periodos = Periodo::all();

        //dd(getdate()['year']);

        return view('estudiante.horario', compact('id', 'rut', 'horario', 'campus', 'periodos', 'nombres', 'apellidos', 'datos'));
    }


    public function consultaEstudiante (Request $request)
    {
        $fecha = explode('-', $request->input('fecha'));
        $id = $request->input('id');
        $datos = $this->datos;

        if ($fecha[0] == '2015')
        {
            $salas = \DB::table('horarios')
                ->join('salas', 'horarios.sala_id', '=', 'salas.id')
                ->where('horarios.fecha', $request->input('fecha'))
                ->join('periodos', 'horarios.periodo_id', '=', 'periodos.id')
                ->where('periodos.id', $request->input('periodo_id'))
                ->join('campus', 'salas.campus_id', '=', 'campus.id')
                ->where('campus_id', $request->input('campus_id'))
                ->select('horarios.fecha', 'salas.nombre as sala', 'periodos.bloque', 'periodos.inicio', 'periodos.fin',
                    'campus.nombre as campus')
                ->get();

            $todas = \DB::table('horarios')
                ->join('salas', 'horarios.sala_id', '=', 'salas.id')
                ->join('periodos', 'horarios.periodo_id', '=', 'periodos.id')
                ->join('campus', 'salas.campus_id', '=', 'campus.id')
                ->select('horarios.fecha', 'salas.nombre as sala', 'periodos.bloque', 'periodos.inicio', 'periodos.fin',
                    'campus.nombre as campus')
                ->get();

            if (!empty($salas))
                return view('estudiante.consulta', compact('id', 'salas', 'datos', 'todas'));
            else
                return redirect()->back()
                    ->with('vacio', 'No se encontraron salas, según los parámetros ingresados')
                    ->withInput();
        }
        else
        {
            return redirect()->back()
                ->withInput()
                ->with('error_anio', 'Error. El año ingresado no corresponde.');
        }

    }

}

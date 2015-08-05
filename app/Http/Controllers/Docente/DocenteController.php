<?php namespace App\Http\Controllers\Docente;

use App\Campus;
use App\Docente;
use App\Estudiante;
use App\Funcionario;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Periodo;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;


class DocenteController extends Controller{

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

        //dd($this->datos[0]['table']);

        if($this->datos[0]['table'] == 'docentes')
        {
            $campus = \DB::table('docentes')
                ->join('departamentos', 'docentes.departamento_id', '=', 'departamentos.id')
                ->join('facultades', 'departamentos.facultad_id', '=', 'facultades.id')
                ->join('campus', 'facultades.campus_id', '=', 'campus.id')
                ->where('docentes.rut', $this->guard->user()->rut)
                ->select('campus.latitud', 'campus.longitud', 'departamentos.nombre as depto', 'facultades.nombre as fac',
                    'campus.direccion', 'campus.nombre as campus')
                ->get();

            return view('docente.index', compact('datos', 'campus'));
        }
        elseif($this->datos[0]['table'] == 'funcionarios')
        {
            $campus = \DB::table('funcionarios')
                ->join('departamentos', 'funcionarios.departamento_id', '=', 'departamentos.id')
                ->join('facultades', 'departamentos.facultad_id', '=', 'facultades.id')
                ->join('campus', 'facultades.campus_id', '=', 'campus.id')
                ->where('funcionarios.rut', $this->guard->user()->rut)
                ->select('campus.latitud', 'campus.longitud', 'departamentos.nombre as depto', 'facultades.nombre as fac',
                    'campus.direccion', 'campus.nombre as campus')
                ->get();

            return view('docente.index', compact('datos', 'campus'));
        }
        else
        {
            $campus = \DB::table('estudiantes')
                ->join('carreras', 'estudiantes.carrera_id', '=', 'carreras.id')
                ->join('escuelas', 'carreras.escuela_id', '=', 'escuelas.id')
                ->join('departamentos', 'escuelas.departamento_id', '=', 'departamentos.id')
                ->join('facultades', 'departamentos.facultad_id', '=', 'facultades.id')
                ->join('campus', 'facultades.campus_id', '=', 'campus.id')
                ->where('funcionarios.rut', $this->guard->user()->rut)
                ->select('campus.latitud', 'campus.longitud', 'departamentos.nombre as depto', 'facultades.nombre as fac',
                    'campus.direccion', 'campus.nombre as campus')
                ->get();

            return view('docente.index', compact('datos', 'campus'));
        }
    }

    public function revisarHorario ()
    {
        $datos = $this->datos;
        $campus = Campus::lists('nombre', 'id');
        $periodos = Periodo::all();

        $horario = \DB::table('docentes')
            ->join('cursos', 'cursos.docente_id', '=', 'cursos.id')
            ->join('asignaturas', 'cursos.asignatura_id', '=', 'asignaturas.id')
            ->join('horarios', 'cursos.id', '=', 'horarios.curso_id')
            ->join('salas', 'horarios.sala_id', '=', 'salas.id')
            ->join('tipos_salas', 'salas.tipo_sala_id', '=', 'tipos_salas.id')
            ->join('periodos', 'horarios.periodo_id', '=', 'periodos.id')->orderBy('periodos.bloque')
            ->join('campus', 'salas.campus_id', '=', 'campus.id')
            ->where('docentes.rut', $this->guard->user()->rut)
            ->select('cursos.anio', 'cursos.seccion', 'cursos.semestre', 'asignaturas.codigo as cod', 'asignaturas.nombre as ramo', 'horarios.fecha', 'salas.nombre as sala', 'periodos.bloque', 'periodos.inicio', 'periodos.fin', 'tipos_salas.nombre as tipo', 'campus.nombre as campus')
            ->get();

        return view('docente.horario', compact('horario', 'datos', 'campus', 'periodos'));
    }

    public function consultaDocente(Request $request)
    {
        $fecha = explode('-', $request->input('fecha'));
        $datos = $this->datos;
        //print_r(getdate()['year']);

        if (getdate()['year'] == $fecha[0])
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
                return view('docente.consulta', compact('id', 'salas', 'nombres', 'apellidos', 'est', 'todas', 'datos'));
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
<?php namespace App\Http\Controllers\EncargadoCampus;

use App\AsignaturaCursada;
use App\Campus;
use App\Carrera;
use App\Curso;
use App\Departamento;
use App\Docente;
use App\Estudiante;
use App\Funcionario;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class EncargadoController extends Controller {

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

        //dd($this->guard->user()->rut);
    }

	public function index ()
    {
        $campus = Campus::select('nombre', 'latitud', 'longitud', 'direccion')
            ->where('rut_encargado', $this->guard->user()->rut)
            ->get();
        $datos = $this->datos;

        return view('encargado.index', compact('campus', 'datos'));
    }
    public function index_personas ()
    {
        $datos = $this->datos;

        $estudiantes = \DB::table('estudiantes')
            ->join('carreras', 'estudiantes.carrera_id', '=', 'carreras.id')
            ->join('escuelas', 'carreras.escuela_id', '=', 'escuelas.id')
            ->join('departamentos', 'escuelas.departamento_id', '=', 'departamentos.id')
            ->join('facultades', 'departamentos.facultad_id', '=', 'facultades.id')
            ->join('campus', 'facultades.campus_id', '=', 'campus.id')
            ->where('campus.rut_encargado', $this->guard->user()->rut)
            ->select('estudiantes.id', 'estudiantes.rut', 'estudiantes.nombres', 'estudiantes.apellidos', 'estudiantes.email',
                'carreras.nombre as carrera', 'carreras.codigo', 'escuelas.nombre as escuela', 'departamentos.nombre as depto')
            ->get();

        $funcionarios = \DB::table('funcionarios')
            ->join('departamentos', 'funcionarios.departamento_id', '=', 'departamentos.id')
            ->join('facultades', 'departamentos.facultad_id', '=', 'facultades.id')
            ->join('campus', 'facultades.campus_id', '=', 'campus.id')
            ->where('campus.rut_encargado', $this->guard->user()->rut)
            ->select('funcionarios.id', 'funcionarios.rut', 'funcionarios.nombres',
                'funcionarios.apellidos', 'departamentos.nombre as depto')
            ->get();

        $docentes = \DB::table('docentes')
            ->join('departamentos', 'docentes.departamento_id', '=', 'departamentos.id')
            ->join('facultades', 'departamentos.facultad_id', '=', 'facultades.id')
            ->join('campus', 'facultades.campus_id', '=', 'campus.id')
            ->where('campus.rut_encargado', $this->guard->user()->rut)
            ->select('docentes.id', 'docentes.rut', 'docentes.nombres',
                'docentes.apellidos', 'departamentos.nombre as depto')
            ->get();

        $carreras = \DB::table('carreras')
            ->join('escuelas', 'carreras.escuela_id', '=', 'escuelas.id')
            ->join('departamentos', 'escuelas.departamento_id', '=', 'departamentos.id')
            ->join('facultades', 'departamentos.facultad_id', '=', 'facultades.id')
            ->join('campus', 'facultades.campus_id', '=', 'campus.id')
            ->where('campus.rut_encargado', $this->guard->user()->rut)
            ->select('carreras.id', 'carreras.nombre as carrera')
            ->get();

        $deptos = Departamento::join
            ('facultades', 'departamentos.facultad_id', '=', 'facultades.id')
            ->join('campus', 'facultades.campus_id', '=', 'campus.id')
            ->where('campus.rut_encargado', $this->guard->user()->rut)
            ->select('departamentos.id', 'departamentos.nombre')
            ->get();

        return view('encargado.personas.index', compact('estudiantes', 'docentes', 'funcionarios', 'carreras', 'deptos', 'datos'));
    }
    /*++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
     *++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
     +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++*/

    /* Estudiantes */
    public function editEstudiante ($id)
    {
        $est = Estudiante::findOrFail($id);
        $carreras = Carrera::lists('nombre', 'id');

        $datos = $this->datos;

        $a_c = \DB::table('asignaturas_cursadas')
            ->join('cursos', 'asignaturas_cursadas.curso_id', '=', 'cursos.id')
            ->join('docentes', 'cursos.docente_id', '=', 'docentes.id')
            ->join('asignaturas', 'cursos.asignatura_id', '=', 'asignaturas.id')
            ->where('asignaturas_cursadas.estudiante_id', $id)
            ->select('asignaturas.codigo as cod', 'asignaturas.nombre as asig', 'docentes.nombres', 'docentes.apellidos',
                'cursos.semestre', 'cursos.anio', 'cursos.seccion')
            ->get();

        $cursos = \DB::table('cursos')
            ->join('docentes', 'cursos.docente_id', '=', 'docentes.id')
            ->join('asignaturas', 'cursos.asignatura_id', '=', 'asignaturas.id')
            ->join('departamentos', 'asignaturas.departamento_id', '=', 'departamentos.id')
            ->join('facultades', 'departamentos.facultad_id', '=', 'facultades.id')
            ->join('campus', 'facultades.campus_id', '=', 'campus.id')
            ->where('campus.rut_encargado', $this->guard->user()->rut)
            ->select('docentes.nombres', 'docentes.apellidos', 'asignaturas.codigo as cod', 'asignaturas.nombre as asig',
                'cursos.id','cursos.semestre', 'cursos.anio', 'cursos.seccion')
            ->get();

        return view('encargado.personas.editar.estudiantes', compact('id', 'est', 'carreras', 'a_c', 'cursos', 'datos'));
    }

    public function a_cEstudiante (Request $request)
    {
        try
        {
            $a_c = new AsignaturaCursada($request->all());
            $a_c->save();

            return redirect()->back()->with('ok', 'Se ha agregado la asignatura');
        }
        catch(\Exception $e)
        {
            return redirect()->back()->with('error', 'Error. No es posible realizar la petición');
        }
    }
    /*++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
     *++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
     +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++*/

    /* Docentes */
    public function editDocente ($id)
    {
        $doc = Docente::findOrFail($id);
        $depto = Departamento::join('facultades', 'departamentos.facultad_id', '=', 'facultades.id')
            ->join('campus', 'facultades.campus_id', '=', 'campus.id')
            ->where('campus.rut_encargado', $this->guard->user()->rut)
            ->select('departamentos.nombre', 'departamentos.id')
            ->get();
        $datos = $this->datos;

        return view('encargado.personas.editar.docentes', compact('id','doc', 'depto', 'datos'));
    }
    /*++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
     *++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
     +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++*/

    /* Funcionarios */
    public function editFuncionario ($id)
    {
        $fun = Funcionario::findOrFail($id);
        $depto = Departamento::join('facultades', 'departamentos.facultad_id', '=', 'facultades.id')
            ->join('campus', 'facultades.campus_id', '=', 'campus.id')
            ->where('campus.rut_encargado', $this->guard->user()->rut)
            ->select('departamentos.nombre', 'departamentos.id')
            ->get();
        $datos = $this->datos;

        return view('encargado.personas.editar.funcionarios', compact('id', 'fun', 'depto', 'datos'));
    }
    /*++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
     *++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
     +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++*/
}

<?php namespace App\Http\Controllers\EncargadoCampus;

use App\Asignatura;
use App\Carrera;
use App\Curso;
use App\Departamento;
use App\Docente;
use App\Escuela;
use App\Estudiante;
use App\Funcionario;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AcademicosController extends Controller {

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

        //dd($this->datos[0]->nombres);

        //dd($this->guard->user()->rut);
    }

	public function index ()
    {
        //dd($this->datos[0]['table']);
        $datos = $this->datos;

        $carreras = \DB::table('carreras')
            ->join('escuelas', 'carreras.escuela_id', '=', 'escuelas.id')
            ->join('departamentos', 'escuelas.departamento_id', '=', 'departamentos.id')
            ->join('facultades', 'departamentos.facultad_id', '=', 'facultades.id')
            ->join('campus', 'facultades.campus_id', '=', 'campus.id')
            ->where('campus.rut_encargado', Auth::user()->rut)
            ->select('carreras.id', 'carreras.codigo as cod', 'carreras.nombre as carrera', 'carreras.descripcion as desc',
                'facultades.nombre as facultad', 'campus.nombre as campus', 'escuelas.nombre as escuela')
            ->get();

        $asignaturas = \DB::table('asignaturas')
            ->join('departamentos', 'asignaturas.departamento_id', '=', 'departamentos.id')
            ->join('facultades', 'departamentos.facultad_id', '=', 'facultades.id')
            ->join('campus', 'facultades.campus_id', '=', 'campus.id')
            ->where('campus.rut_encargado', Auth::user()->rut)
            ->select('asignaturas.id', 'asignaturas.codigo', 'asignaturas.departamento_id', 'asignaturas.codigo',
                'asignaturas.nombre', 'asignaturas.descripcion', 'departamentos.nombre as depto')
            ->get();

        $cursos = \Db::table('cursos')
            ->join('docentes', 'cursos.docente_id', '=', 'docentes.id')
            ->join('asignaturas', 'cursos.asignatura_id', '=', 'asignaturas.id')
            ->join('departamentos', 'asignaturas.departamento_id', '=', 'departamentos.id')
            ->join('facultades', 'departamentos.facultad_id', '=', 'facultades.id')
            ->join('campus', 'facultades.campus_id', '=', 'campus.id')
            ->where('campus.rut_encargado', Auth::user()->rut)
            ->select('cursos.id', 'asignaturas.codigo as cod','asignaturas.nombre as ramo', 'docentes.nombres',
                'docentes.apellidos', 'cursos.semestre',
                'cursos.anio', 'cursos.seccion')
            ->get();

        $escuelas = \DB::table('escuelas')
            ->join('departamentos', 'escuelas.departamento_id', '=', 'escuelas.id')
            ->join('facultades', 'departamentos.facultad_id', '=', 'facultades.id')
            ->join('campus', 'facultades.campus_id', '=', 'campus.id')
            ->where('campus.rut_encargado', Auth::user()->rut)
            ->select('escuelas.nombre', 'escuelas.id')
            ->get();

        $depto = \DB::table('departamentos')
            ->join('facultades', 'departamentos.facultad_id', '=', 'facultades.id')
            ->join('campus', 'facultades.campus_id', '=', 'campus.id')
            ->where('campus.rut_encargado', Auth::user()->rut)
            ->select('departamentos.nombre', 'departamentos.id')
            ->get();

        $docentes = Docente::join('departamentos', 'docentes.departamento_id', '=', 'departamentos.id')
            ->join('facultades', 'departamentos.facultad_id', '=', 'facultades.id')
            ->join('campus', 'facultades.campus_id', '=', 'campus.id')
            ->where('campus.rut_encargado', Auth::user()->rut)
            ->select('docentes.id', 'docentes.nombres', 'docentes.apellidos', 'docentes.rut')
            ->get();

        return view ('encargado.academicos.index', compact('carreras', 'escuelas', 'asignaturas',
            'depto', 'docentes', 'cursos', 'datos'));
    }

    /*++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
     *++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
     +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++*/

    public function storeCarreras(Request $request)
    {
        $carrera = new Carrera($request->all());
        $carrera->save();

        return redirect()->back()->with('carrera_add', 'Se ha agregado correctamente la carrera');
    }

    public function editCarreras ($id)
    {
        $carrera = Carrera::findOrFail($id);
        $escuelas = Escuela::join('departamentos', 'escuelas.departamento_id', '=', 'departamentos.id')
            ->join('facultades', 'departamentos.facultad_id', '=', 'facultades.id')
            ->join('campus', 'facultades.campus_id', '=', 'campus.id')
            ->where('campus.rut_encargado', Auth::user()->rut)
            ->select('escuelas.id', 'escuelas.nombre')
            ->get();
        $datos = $this->datos;

        return view('encargado.academicos.carreras', compact('id', 'carrera', 'escuelas', 'datos'));
    }

    public function updateCarreras (Request $request)
    {
        $carrera = Carrera::findOrFail($request->input('id'));
        $carrera->fill($request->all());

        $carrera->save();

        return redirect()->back()->with('carrera_update', 'Se ha actualizado correctamente la carrera');
    }
    /*++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
     *++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
     +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++*/

    public function storeAsignatura (Request $request)
    {
        $asignatura = new Asignatura($request->all());
        $asignatura->save();

        return redirect()->back()->with('asignatura_add', 'Se ha agregado correctamente la carrera');
    }
    public function editAsignatura ($id)
    {
        $asignaturas = Asignatura::findOrFail($id);
        $departamentos = Departamento::join('facultades', 'departamentos.facultad_id', '=', 'facultades.id')
            ->join('campus', 'facultades.campus_id', '=', 'campus.id')
            ->where('campus.rut_encargado', Auth::user()->rut)
            ->select('departamentos.id', 'departamentos.nombre')
            ->get();
        $datos = $this->datos;

        return view('encargado.academicos.asignaturas', compact('id', 'departamentos', 'asignaturas', 'datos'));
    }

    public function updateAsignatura (Request $request)
    {
        $asignatura = Asignatura::findOrFail($request->input('id'));
        $asignatura->fill($request->all());
        $asignatura->save();

        return redirect()->back()->with('asignatura_update', 'Se ha actualizado correctamente la carrera');
    }
    /*++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
     *++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
     +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++*/

    public function storeCurso(Request $request)
    {
        $curso = new Curso($request->all());
        $curso->save();

        return redirect()->back()->with('curso_add', 'Se ha agregado correctamente la carrera');
    }
    public function editCurso ($id)
    {
        $cursos = Curso::findOrFail($id);
        $asignaturas = Asignatura::join('departamentos', 'asignaturas.departamento_id', '=', 'departamentos.id')
            ->join('facultades', 'departamentos.facultad_id', '=', 'facultades.id')
            ->join('campus', 'facultades.campus_id', '=', 'campus.id')
            ->where('campus.rut_encargado', Auth::user()->rut)
            ->select('asignaturas.nombre', 'asignaturas.id')->orderBy('asignaturas.nombre')
            ->get();
        $docentes = Docente::join('departamentos', 'docentes.departamento_id', '=', 'departamentos.id')
            ->join('facultades', 'departamentos.facultad_id', '=', 'facultades.id')
            ->join('campus', 'facultades.campus_id', '=', 'campus.id')
            ->where('campus.rut_encargado', Auth::user()->rut)
            ->select('docentes.id', 'docentes.nombres', 'docentes.apellidos', 'docentes.rut')
            ->orderBy('docentes.apellidos')
            ->get();
        $datos = $this->datos;

        return view('encargado.academicos.cursos', compact('id', 'cursos', 'asignaturas', 'docentes', 'datos'));
    }

    public function updateCurso (Request $request)
    {
        $curso = Curso::findOrFail($request->input('id'));
        $curso->fill($request->all());
        $curso->save();

        return redirect()->back()->with('curso_update', 'Se ha actualizado correctamente el curso');
    }
    /*++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
     *++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
     +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++*/

    public function deleteCarrera ($id, Request $request)
    {
        $carrera = Carrera::findOrFail($id);
        $mensaje = 'Se ha borrado la carrera: ' . $carrera->nombre;
        $carrera->delete();
        if($request->ajax())
            return response()->json([
                'id'        => $carrera->id,
                'message'   => $mensaje
            ]);
    }

    public function deleteAsignatura ($id, Request $request)
    {
        $asig = Asignatura::findOrFail($id);
        $mensaje = 'Se ha borrado la asignatura: ' . $asig->nombre;
        $asig->delete();
        if($request->ajax())
            return response()->json([
                'id'        => $asig->id,
                'message'   => $mensaje
            ]);
    }

    public function deleteCurso ($id, Request $request)
    {
        $cur = Curso::findOrFail($id);
        $mensaje = 'Se ha borrado el curso';
        $cur->delete();
        if($request->ajax())
            return response()->json([
                'id'        => $cur->id,
                'message'   => $mensaje
            ]);
    }

}

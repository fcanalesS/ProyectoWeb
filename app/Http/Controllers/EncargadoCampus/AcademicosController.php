<?php namespace App\Http\Controllers\EncargadoCampus;

use App\Asignatura;
use App\Carrera;
use App\Curso;
use App\Departamento;
use App\Docente;
use App\Escuela;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class AcademicosController extends Controller {

	public function index ()
    {
        $carreras = \DB::table('carreras')
            ->join('escuelas', 'carreras.escuela_id', '=', 'escuelas.id')
            ->join('departamentos', 'escuelas.departamento_id', '=', 'departamentos.id')
            ->join('facultades', 'departamentos.facultad_id', '=', 'facultades.id')
            ->leftjoin('campus', 'facultades.campus_id', '=', 'campus.id')
            ->select('carreras.id', 'carreras.codigo as cod', 'carreras.nombre as carrera', 'carreras.descripcion as desc',
                'facultades.nombre as facultad', 'campus.nombre as campus', 'escuelas.nombre as escuela')
            ->get();

        $asignaturas = Asignatura::select('id', 'codigo', 'departamento_id', 'codigo', 'nombre', 'descripcion')
            ->with('asignaturas_departamentos')
            ->get();

        $cursos = \Db::table('cursos')
            ->join('docentes', 'cursos.docente_id', '=', 'docentes.id')
            ->join('asignaturas', 'cursos.asignatura_id', '=', 'asignaturas.id')
            ->select('cursos.id', 'asignaturas.codigo as cod','asignaturas.nombre as ramo', 'docentes.nombres',
                'docentes.apellidos', 'cursos.semestre',
                'cursos.anio', 'cursos.seccion')
            ->get();

        $escuelas = Escuela::lists('nombre', 'id');
        $depto = Departamento::lists('nombre', 'id');
        $docentes = Docente::select('id', 'nombres', 'apellidos', 'rut')
            ->orderBy('apellidos')
            ->get();

        //dd($docentes->toJson());



        return view ('encargado.academicos.index', compact('carreras', 'escuelas', 'asignaturas',
            'depto', 'docentes', 'cursos'));
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
        $escuelas = Escuela::lists('nombre', 'id');

        return view('encargado.academicos.carreras', compact('id', 'carrera', 'escuelas'));
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
        $departamentos = Departamento::lists('nombre', 'id');

        return view('encargado.academicos.asignaturas', compact('id', 'departamentos', 'asignaturas'));
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
        $asignaturas = Asignatura::lists('nombre', 'id');
        $docentes = Docente::select('id', 'nombres', 'apellidos', 'rut')
            ->orderBy('apellidos')
            ->get();

        return view('encargado.academicos.cursos', compact('id', 'cursos', 'asignaturas', 'docentes'));
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

}

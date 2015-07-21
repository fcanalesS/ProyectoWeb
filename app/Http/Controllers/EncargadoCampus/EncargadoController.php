<?php namespace App\Http\Controllers\EncargadoCampus;

use App\AsignaturaCursada;
use App\Carrera;
use App\Curso;
use App\Departamento;
use App\Docente;
use App\Estudiante;
use App\Funcionario;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class EncargadoController extends Controller {

	public function index ($rut, Request $request)
    {
        $r = $rut;
        return view('encargado.index', compact('rut'));
    }
    public function index_personas ($rut)
    {
        $estudiantes = \DB::table('estudiantes')
            ->join('carreras', 'estudiantes.carrera_id', '=', 'carreras.id')
            ->join('escuelas', 'carreras.escuela_id', '=', 'escuelas.id')
            ->join('departamentos', 'escuelas.departamento_id', '=', 'departamentos.id')
            ->select('estudiantes.id', 'estudiantes.rut', 'estudiantes.nombres', 'estudiantes.apellidos', 'estudiantes.email',
                'carreras.nombre as carrera', 'carreras.codigo', 'escuelas.nombre as escuela', 'departamentos.nombre as depto')
            ->get();

        $funcionarios = Funcionario::select('id', 'rut', 'departamento_id', 'nombres', 'apellidos')
            ->with('funcionario_departamento')
            ->get();

        $docentes = Docente::select('id', 'departamento_id', 'rut', 'nombres', 'apellidos')
            ->with('docente_departamento')->orderBy('departamento_id')
            ->get();

        $carreras = Carrera::lists('nombre', 'id');
        $deptos = Departamento::lists('nombre', 'id');

        return view('encargado.personas.index', compact('rut', 'estudiantes', 'docentes', 'funcionarios', 'carreras', 'deptos'));
    }
    /*++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
     *++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
     +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++*/

    /* Estudiantes */
    public function editEstudiante ($id, $rut)
    {
        $est = Estudiante::findOrFail($id);
        $carreras = Carrera::lists('nombre', 'id');

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
            ->select('docentes.nombres', 'docentes.apellidos', 'asignaturas.codigo as cod', 'asignaturas.nombre as asig',
                'cursos.id','cursos.semestre', 'cursos.anio', 'cursos.seccion')
            ->get();

        return view('encargado.personas.editar.estudiantes', compact('id', 'rut', 'est', 'carreras', 'a_c', 'cursos'));
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
    public function editDocente ($id, $rut)
    {
        $doc = Docente::findOrFail($id);
        $depto = Departamento::lists('nombre', 'id');

        return view('encargado.personas.editar.docentes', compact('id', 'rut','doc', 'depto'));
    }
    /*++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
     *++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
     +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++*/

    /* Funcionarios */
    public function editFuncionario ($id, $rut)
    {
        $fun = Funcionario::findOrFail($id);
        $depto = Departamento::lists('nombre', 'id');

        return view('encargado.personas.editar.funcionarios', compact('id', 'rut', 'fun', 'depto'));
    }
    /*++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
     *++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
     +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++*/
}

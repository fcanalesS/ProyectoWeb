<?php namespace App\Http\Controllers\ECampus;

use App\Asignatura;
use App\Carrera;
use App\Curso;
use App\Departamento;
use App\Docente;
use App\Escuela;
use App\Estudiante;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class IngresoDatosController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $estudiantes = Estudiante::select('id', 'carrera_id', 'rut', 'nombres', 'apellidos', 'email')
                            ->with('estudiante_carrera')
                            ->get();

        $asignaturas = Asignatura::select('id', 'departamento_id', 'codigo', 'nombre', 'descripcion')
                            ->with('asignaturas_departamentos')
                            ->get();

        $cursos = Curso::select('id', 'asignatura_id', 'docente_id', 'semestre', 'anio', 'seccion')
                    ->with('curso_asignatura', 'curso_docente')
                    ->get();

        $carreras = Carrera::select('id', 'escuela_id', 'codigo', 'nombre', 'descripcion')
                        ->with('carrera_escuela')
                        ->get();
        $carrera_lists = Carrera::lists('nombre', 'id');
        $departamentos = Departamento::lists('nombre', 'id');
        $asig_lists = Asignatura::lists('nombre', 'id');
        $docente_lists = Docente::lists('nombres', 'id');
        $escuela_lists = Escuela::lists('nombre', 'id');

		return view('encargado.ingreso-datos.index',
            compact('cursos', 'estudiantes', 'asignaturas', 'carreras',
                'carrera_lists', 'departamentos', 'asig_lists', 'docente_lists', 'escuela_lists'));
	}

    /***** Asignatura *****/
    public function store_asignatura(Request $request)
    {
        $codigo = $request->input('alpha') . $request->input('num');
        $array = ['nombre' => $request->input('nombre'), 'codigo' => $codigo,
                    'descripcion' => $request->input('descripcion'),
                    'departamento_id' => $request->input('departamento_id')];
        $asignatura = new Asignatura();
        $asignatura->fill($array);
        $asignatura->save();

        Session::flash('add_asig', 'La asignatura ' . $request->input('nombre') . ' se ha agregado');

        return redirect()->back();
    }

    public function edit_asignatura($id)
    {
        $asignatura = Asignatura::findOrFail($id);
        $depto = Departamento::lists('nombre', 'id');

        return view('encargado.ingreso-datos.edit_asig', compact('id', 'asignatura', 'depto'));
    }

    public function update_asignatura($id, Request $request)
    {
        $asignatura = Asignatura::findOrFail($id);
        $asignatura->fill($request->all());
        $asignatura->save();

        Session::flash('update_asig', 'La asignatura ' . $request->input('nombre') . ' se ha actualizado');

        return redirect('encargado/ingreso-datos')->with('update_asig', 'La asignatura ' . $request->input('nombre') . ' se ha actualizado');
    }
    /***** Asignatura *****/

    /***** Cursos *****/
    public function store_curso(Request $request)
    {
        $curso = new Curso($request->all());
        $curso->save();

        Session::flash('add_curso', 'El curso ha sido creado');

        return redirect()->back();
    }

    public function edit_curso($id)
    {
        $curso = Curso::findOrFail($id);

        $asig_lists = Asignatura::lists('nombre', 'id');
        $doc_lists = Docente::lists('nombres', 'id');
        //dd($curso);

        return view('encargado.ingreso-datos.edit_curso', compact('curso', 'asig_lists', 'doc_lists', 'id'));
    }

    public function update_curso($id, Request $request)
    {
        $curso = Curso::findOrFail($id);
        $curso->fill($request->all());
        $curso->save();

        return redirect('encargado/ingreso-datos#cursos')
            ->with('update_curso', 'El curso ' . $request->input('seccion') . ' se ha actualizado');
    }
    /***** Cursos *****/

    /***** Carrera *****/
    public function store_carrera (Request $request)
    {
        $carrera = new Carrera($request->all());
        $carrera->save();

        Session::flash('add_carrera', 'La carrera ' . $request->input('nombre') . ' se ha agregado');

        return redirect()->back();
    }

    public function edit_carrera($id)
    {
        $carrera = Carrera::findOrFail($id);
        $escuela_lists = Escuela::lists('nombre', 'id');

        return view('encargado.ingreso-datos.edit_carrera', compact('id', 'carrera', 'escuela_lists'));
    }

    public function update_carrera($id, Request $request)
    {
        $carrera = Carrera::findOrFail($id);
        $carrera->fill($request->all());

        if($request->input('escuela_id') == 0)
            return redirect()->back()
                ->with('error_escuela', 'Debe seleccionar una escuela válida');
        else
        {
            $carrera->fill($request->all());
            $carrera->save();

            return redirect('encargado/ingreso-datos#car')
                ->with('update_carrera', 'La carrera ' . $request->input('nombre') . ' se ha actualizado');
        }
    }
    /***** Carrera *****/
}

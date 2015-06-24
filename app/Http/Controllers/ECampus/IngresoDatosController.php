<?php namespace App\Http\Controllers\ECampus;

use App\Asignatura;
use App\Carrera;
use App\Curso;
use App\Departamento;
use App\Docente;
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

		return view('encargado.ingreso-datos.index',
            compact('cursos', 'estudiantes', 'asignaturas', 'carreras',
                'carrera_lists', 'departamentos', 'asig_lists', 'docente_lists'));
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

        return redirect()->back(302);
    }
    /***** Cursos *****/
}

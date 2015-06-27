<?php namespace App\Http\Controllers\ECampus;

use App\Asignatura;
use App\AsignaturaCursada;
use App\Carrera;
use App\Curso;
use App\Estudiante;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\RutUtils;
use Illuminate\Http\Request;

class RevisarEstudianteController extends Controller {

	public function index($id)
    {
        $estudiante = Estudiante::findOrFail($id);

        $ac = \DB::table('asignaturas_cursadas')
            ->join('estudiantes', 'asignaturas_cursadas.estudiante_id', '=', 'estudiantes.id')
            ->join('cursos', 'asignaturas_cursadas.curso_id', '=', 'cursos.id')
            ->join('asignaturas', 'cursos.asignatura_id', '=', 'asignaturas.id')
            ->where('asignaturas_cursadas.estudiante_id', '=', $id)
            ->select('cursos.seccion', 'cursos.semestre', 'cursos.anio', 'asignaturas.nombre')
            ->get();

        $carrera = Carrera::select('codigo', 'nombre')
            ->where('id', $estudiante->carrera_id)
            ->get();

        $datos = ['carrera_id' => $estudiante->carrera_id, 'rut' => $estudiante->rut .'-'. RutUtils::dv($estudiante->rut),
            'nombres' => explode(' ', $estudiante->nombres), 'apellidos' => explode(' ', $estudiante->apellidos),
            'email' => $estudiante->email];

        $asig = \DB::table('cursos')
            ->join('asignaturas', 'cursos.asignatura_id', '=', 'asignaturas.id')
            ->select('cursos.id', 'cursos.seccion', 'asignaturas.nombre')
            ->get();

        return view('encargado.revisar.index',
            compact('id', 'estudiante', 'datos', 'ac', 'carrera', 'asig'));
    }

    public function asignatura_c(Request $request)
    {
        $ac = new AsignaturaCursada($request->all());

        try{
            $ac->save();
            return redirect()->back()
                ->with('ac_add', 'Se ha agregado correctamente la asignatura cursada');
        }
        catch(\Exception $e)
        {
            return redirect()->back()
                ->with('ac_add_error', 'Hubo un problema al almacenar los datos, revise si colocó los correctos');
        }
    }

}

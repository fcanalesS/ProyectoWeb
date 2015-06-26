<?php namespace App\Http\Controllers\ECampus;

use App\AsignaturaCursada;
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
        $ac = AsignaturaCursada::select('id', 'curso_id', 'estudiante_id')
                ->where('estudiante_id', $estudiante->id)
                ->with('ac_curso')->get();

        $datos = ['carrera_id' => $estudiante->carrera_id, 'rut' => $estudiante->rut .'-'. RutUtils::dv($estudiante->rut),
            'nombres' => explode(' ', $estudiante->nombres), 'apellidos' => explode(' ', $estudiante->apellidos),
            'email' => $estudiante->email];

        return view('encargado.revisar.index', compact('id', 'estudiante', 'datos', 'ac'));
    }

}

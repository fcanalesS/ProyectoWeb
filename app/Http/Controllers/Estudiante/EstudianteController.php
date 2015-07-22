<?php namespace App\Http\Controllers\Estudiante;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class EstudianteController extends Controller {

	public function index ($rut)
    {
        $estudiante = \DB::table('estudiantes')
            ->join('carreras', 'estudiantes.carrera_id', '=', 'carreras.id')
            ->join('escuelas', 'carreras.escuela_id', '=', 'escuelas.id')
            ->join('departamentos', 'escuelas.departamento_id', '=', 'departamentos.id')
            ->join('facultades', 'departamentos.facultad_id', '=', 'facultades.id')
            ->join('campus', 'facultades.campus_id', '=', 'campus.id')
            ->where('estudiantes.rut', $rut)
            ->select('estudiantes.nombres', 'estudiantes.apellidos', 'estudiantes.rut', 'estudiantes.email',
                'carreras.codigo as cod', 'carreras.nombre as carrera', 'escuelas.nombre as escuela',
                'departamentos.nombre as depto', 'facultades.nombre as facultad', 'campus.nombre as campus',
                'campus.latitud', 'campus.longitud')
            ->get();

        //dd($estudiante[0]->nombres);
        return view('estudiante.index', compact('rut', 'estudiante'));
    }

}

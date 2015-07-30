<?php namespace App\Http\Controllers\Docente;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;


class DocenteController extends Controller{

    public function index ()
    {
        $datos_docente = \DB::table('docentes')
            ->join('departamentos', 'docentes.departamento_id', '=', 'departamentos.id')
            ->join('facultades', 'departamentos.facultad_id', '=', 'facultades.id')
            ->join('campus', 'facultades.campus_id', '=', 'campus_id')
            ->where('docentes.rut', 20459309)
            ->select('docentes.id', 'docentes.nombres', 'docentes.apellidos', 'departamentos.nombre as depto',
                'campus.nombre as campus', 'facultades.nombre', 'campus.direccion',
                'campus.latitud', 'campus.longitud')
            ->get();

        dd($datos_docente);

        return view('docente.index', compact('datos_docente'));
    }

}
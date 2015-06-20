<?php namespace App\Http\Controllers\Admini;

use App\Campus;
use App\Docente;
use App\Estudiante;
use App\Funcionario;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\RolUsuario;
use Illuminate\Http\Request;

class AdminController extends Controller {

	public function index (Request $request)
    {
        $rut = $request->route('id');

        $type_user = RolUsuario::select('rol_id', 'rut')
                        ->with('rol')
                        ->where('rut', '=', 16967863)
                        ->orderBy('id')->get();

        $campus = Campus::all();

        $docentes = Docente::select('id', 'departamento_id', 'rut', 'nombres', 'apellidos')
                            ->with('docente_departamento')->get();//->toArray();

        $func = Funcionario::select('id', 'departamento_id', 'rut', 'nombres', 'apellidos')
                            ->with('funcionario_departamento')->get();

        $estudiantes = Estudiante::select('id', 'carrera_id', 'rut', 'nombres', 'apellidos', 'email')
                            ->with('estudiante_carrera')->get();

        //dd($docentes);



        return view('admin.index',compact('rut', 'campus', 'docentes', 'func', 'estudiantes', 'type_user'));
    }

}

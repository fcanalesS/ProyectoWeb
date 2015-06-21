<?php namespace App\Http\Controllers\Admini;

use App\Departamento;
use App\Docente;
use App\Estudiante;
use App\Funcionario;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Rol;
use App\RolUsuario;
use Illuminate\Http\Request;

class UsuarioController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $docentes = Docente::select('id', 'departamento_id', 'rut', 'nombres', 'apellidos')
            ->with('docente_departamento')->get();//->toArray();

        $func = Funcionario::select('id', 'departamento_id', 'rut', 'nombres', 'apellidos')
            ->with('funcionario_departamento')->get();

        $estudiantes = Estudiante::select('id', 'carrera_id', 'rut', 'nombres', 'apellidos', 'email')
            ->with('estudiante_carrera')->get();

		return view('admin.usuarios.index', compact('func', 'docentes', 'estudiantes'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id, $tipo)
	{
        if ($tipo == 'funcionarios')
        {
            $func = Funcionario::findOrFail($id);
            $rut = $func['rut'];


            $datos_usuario = \DB::table('roles_usuarios')
                ->join('roles', 'roles_usuarios.rol_id', '=','roles.id')
                ->where('roles_usuarios.rut', '=', $rut)
                ->select('roles_usuarios.id','roles_usuarios.rut','roles.nombre')
                ->get();

            $roles = Rol::select('id', 'nombre')->get();

            //$type = RolUsuario::select('rol_id')->where('rut', '=', $rut)->with('rol')->get();

            //dd($datos_usuario[0]->nombre);


            return view('admin.usuarios.edit_func', compact('func', 'datos_usuario', 'id', 'roles', 'tipo'));
        }
        elseif ($tipo == 'estudiantes')
        {
            dd("Aqui van los estudiantes");
        }
        else
        {
            dd("Aqui van los docentes");
        }
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, $tipo)
	{
		dd ($id . ' // ' . $tipo);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}

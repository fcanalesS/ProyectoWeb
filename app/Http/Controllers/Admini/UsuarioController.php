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
use Illuminate\Support\Facades\Session;

class UsuarioController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $docentes = Docente::select('id', 'departamento_id', 'rut', 'nombres', 'apellidos')
            ->with('docente_departamento')->get();

        $func = Funcionario::select('id', 'departamento_id', 'rut', 'nombres', 'apellidos')
            ->with('funcionario_departamento')->get();

        $estudiantes = Estudiante::select('id', 'carrera_id', 'rut', 'nombres', 'apellidos', 'email')
            ->with('estudiante_carrera')->get();

		return view('admin.usuarios.index', compact('func', 'docentes', 'estudiantes'));
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

            $rol = Rol::lists('nombre', 'id');

            //dd($datos_usuario);

            return view('admin.usuarios.edit_func', compact('func', 'datos_usuario', 'id', 'tipo', 'rol'));
        }
        elseif ($tipo == 'docentes')
        {
            $docente = Docente::findOrFail($id);
            $rut = $docente['rut'];

            $datos_usuario = \DB::table('roles_usuarios')
                ->join('roles', 'roles_usuarios.rol_id', '=','roles.id')
                ->where('roles_usuarios.rut', '=', $rut)
                ->select('roles_usuarios.id','roles_usuarios.rut','roles.nombre')
                ->get();

            $rol = Rol::lists('nombre', 'id');

            return view('admin.usuarios.edit_doc', compact('docente', 'datos_usuario', 'id', 'tipo', 'rol'));
        }
        else
        {
            $estudiante = Estudiante::findOrFail($id);
            $rut = $estudiante['rut'];

            $datos_usuario = \DB::table('roles_usuarios')
                ->join('roles', 'roles_usuarios.rol_id', '=','roles.id')
                ->where('roles_usuarios.rut', '=', $rut)
                ->select('roles_usuarios.id','roles_usuarios.rut','roles.nombre')
                ->get();

            $rol = Rol::lists('nombre', 'id');

            return view('admin.usuarios.edit_est', compact('estudiante', 'datos_usuario', 'id', 'tipo', 'rol'));
        }
	}

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @param $tipo
     * @param $rut
     * @param Request $request
     * @return Response
     */
	public function update($id, $tipo, $rut, Request $request)
	{
        if ($tipo == 'funcionarios')
        {
            $rol_select_func = $request->input('rol_asig');

            $array1 = ['rut' => $rut, 'rol_id' => $rol_select_func];

            $typo1 = RolUsuario::findOrFail($id);
            $typo1->fill($array1);
            $typo1->save();

            $rol1 = Rol::find($rol_select_func);

            //dd($rol_select . ' // ' . $rut);

            Session::flash('promoted', 'El usuario ha sido promovido a ' . $rol1->nombre);

            return redirect()->back();
        }
        elseif ($tipo == 'docentes')
        {
            $rol_select_doc = $request->input('rol_asig');
            $array2 = ['rut' => $rut, 'rol_id' => $rol_select_doc];

            $typo2 = RolUsuario::findOrFail($id);
            $typo2->fill($array2);
            $typo2->save();

            $rol2 = Rol::find($rol_select_doc);

            Session::flash('promoted', 'El usuario ha sido promovido a ' . $rol2->nombre);

            return redirect()->back();
        }
        else
        {
            $rol_select_est = $request->input('rol_asig');
            $array3 = ['rut' => $rut, 'rol_id' => $rol_select_est];

            $typo3 = RolUsuario::findOrFail($id);
            $typo3->fill($array3);
            $typo3->save();

            $rol3 = Rol::find($rol_select_est);

            Session::flash('promoted', 'El usuario ha sido promovido a ' . $rol3->nombre);

            return redirect()->back();
        }

	}

}

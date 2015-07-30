<?php namespace App\Http\Controllers\Admin;

use App\Departamento;
use App\Docente;
use App\Estudiante;
use App\Funcionario;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Rol;
use App\RolUsuario;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Storage;

class UsuariosController extends Controller {

	public function index ()
    {
        $funcionarios = Funcionario::select('id', 'rut', 'departamento_id', 'nombres', 'apellidos')
            ->with('funcionario_departamento')
            ->get();

        $docentes = Docente::select('id', 'departamento_id', 'rut', 'nombres', 'apellidos')
            ->with('docente_departamento')
            ->get();

        $estudiantes = \DB::table('estudiantes')
            ->join('carreras', 'estudiantes.carrera_id', '=', 'carreras.id')
            ->join('escuelas', 'carreras.escuela_id', '=', 'escuelas.id')
            ->join('departamentos', 'escuelas.departamento_id', '=', 'departamentos.id')
            ->select('estudiantes.id', 'estudiantes.rut', 'estudiantes.nombres', 'estudiantes.apellidos', 'estudiantes.email',
                'carreras.nombre as carrera', 'carreras.codigo', 'escuelas.nombre as escuela', 'departamentos.nombre')
            ->get();

        return view('admin.usuarios.index', compact('funcionarios', 'docentes', 'estudiantes'));
    }

    public function edit (Request $request)
    {
        $id = $request->segment(4);
        $tipo = $request->segment(5);

        if ($tipo == 'funcionarios')
        {
            $func = Funcionario::findOrFail($id);
            $depto = Departamento::lists('nombre', 'id');

            $rut = $func['rut'];

            $rol = \DB::table('roles_usuarios')
                ->join('roles', 'roles_usuarios.rol_id', '=', 'roles.id')
                ->where('roles_usuarios.rut', $rut)
                ->select('roles.nombre', 'roles.id as rol_id')
                ->get();

            $tipo_rol = Rol::all();

            return view('admin.usuarios.edit_func', compact('id', 'func', 'depto', 'rol', 'tipo_rol'));
        }

        if ($tipo == 'docentes')
        {
            $doc = Docente::findOrFail($id);
            $depto = Departamento::lists('nombre', 'id');
            $rut = $doc['rut'];

            $rol = \DB::table('roles_usuarios')
                ->join('roles', 'roles_usuarios.rol_id', '=', 'roles.id')
                ->where('roles_usuarios.rut', $rut)
                ->select('roles.nombre', 'roles.id as rol_id')
                ->get();

            $tipo_rol = Rol::all();

            return view('admin.usuarios.edit_doc', compact('id', 'doc', 'depto', 'rol', 'tipo_rol'));
        }

        if ($tipo == 'estudiantes')
        {
            $est = \DB::table('estudiantes')
                ->join('carreras', 'estudiantes.carrera_id', '=', 'carreras.id')
                ->join('escuelas', 'carreras.escuela_id', '=', 'escuelas.id')
                ->join('departamentos', 'escuelas.departamento_id', '=', 'departamentos.id')
                ->where('estudiantes.id', $id)
                ->select('estudiantes.id', 'estudiantes.rut', 'estudiantes.nombres', 'estudiantes.apellidos',
                    'estudiantes.email', 'carreras.nombre as carrera', 'carreras.codigo',
                    'escuelas.nombre as escuela', 'departamentos.nombre')
                ->get();

            $rut = $est[0]->rut;

            $rol = \DB::table('roles_usuarios')
                ->join('roles', 'roles_usuarios.rol_id', '=', 'roles.id')
                ->where('roles_usuarios.rut', $rut)
                ->select('roles.nombre', 'roles.id as rol_id')
                ->get();

            $tipo_rol = Rol::all();

            return view('admin.usuarios.edit_est', compact('id', 'est', 'rol', 'tipo_rol'));
        }



    }

    public function update ($id, Request $request)
    {
        if($request->input('tipo') == 'funcionario')
        {
            $datos_func = ['departamento_id' => $request->input('departamento_id')];
            $u_f = Funcionario::findOrFail($id);
            $u_f->fill($datos_func);
            $u_f->save();

            if($request->input('rol_id_add') != 0)
            {
                $rol_func = ['rol_id' => $request->input('rol_id_add'), 'rut' => $request->input('rut')];
                $u_r = new RolUsuario($rol_func);
                $u_r->save();
            }

            return redirect()->back()->with('promoted', 'Se a actualizado correctamente el usuario');
        }

        if($request->input('tipo') == 'docente')
        {
            $datos_doc = ['departamento_id' => $request->input('departamento_id')];
            $u_d = Docente::findOrFail($id);
            $u_d->fill($datos_doc);
            $u_d->save();

            if($request->input('rol_id_add') != 0)
            {
                $rol_func = ['rol_id' => $request->input('rol_id_add'), 'rut' => $request->input('rut')];
                $u_r = new RolUsuario($rol_func);
                $u_r->save();
            }

            return redirect()->back()->with('promoted', 'Se a actualizado correctamente el usuario');
        }

        if ($request->input('tipo') == 'estudiante')
        {
            $datos_est = ['email' => $request->input('email')];
            $u_e = Estudiante::findOrFail($id);
            $u_e->fill($datos_est);
            $u_e->save();

            if($request->input('rol_id_add') != 0)
            {
                $rol_func = ['rol_id' => $request->input('rol_id_add'), 'rut' => $request->input('rut')];
                $u_r = new RolUsuario($rol_func);
                $u_r->save();
            }

            return redirect()->back()->with('promoted', 'Se a actualizado correctamente el usuario');
        }
    }
    /*+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++*
     *+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++*
     ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++**/

    public function rolesFuncionariosArchivos (Request $request)
    {
        $file = $request->file('file');

        if ($file->getClientOriginalExtension() == 'xls' || $file->getClientOriginalExtension() == 'xlsx')
        {
            $nombre = $file->getClientOriginalName();
            Storage::disk('local')->put($nombre, \File::get($file));

            Excel::load('/public/storage/'.$nombre, function($file)
            {
                $r = $file->get();
                foreach($r as $key=>$value)
                {
                    $est = new RolUsuario();
                    $est->fill(['rut' => $value->rut, 'rol_id' => $value->rol_id]);
                    $est->save();
                }
            });

            return redirect()->back()->with('funcionario_file', 'Se ha procesado correctamente el archivo');
        }
        else
        {
            return redirect()->back()->with('funcionario_file_error', 'Error. La extensión no es válida. El archivo no fue procesado');
        }
    }

    public function rolesDocentesArchivos (Request $request)
    {
        $file = $request->file('file');

        if ($file->getClientOriginalExtension() == 'xls' || $file->getClientOriginalExtension() == 'xlsx')
        {
            $nombre = $file->getClientOriginalName();
            Storage::disk('local')->put($nombre, \File::get($file));

            Excel::load('/public/storage/'.$nombre, function($file)
            {
                $r = $file->get();
                foreach($r as $key=>$value)
                {
                    $est = new RolUsuario();
                    $est->fill(['rut' => $value->rut, 'rol_id' => $value->rol_id]);
                    $est->save();
                }
            });

            return redirect()->back()->with('docente_file', 'Se ha procesado correctamente el archivo');
        }
        else
        {
            return redirect()->back()->with('docente_file_error', 'Error. La extensión no es válida. El archivo no fue procesado');
        }
    }

    public function rolesEstudiantesArchivos (Request $request)
    {
        $file = $request->file('file');

        if ($file->getClientOriginalExtension() == 'xls' || $file->getClientOriginalExtension() == 'xlsx')
        {
            $nombre = $file->getClientOriginalName();
            Storage::disk('local')->put($nombre, \File::get($file));

            Excel::load('/public/storage/'.$nombre, function($file)
            {
                $r = $file->get();
                foreach($r as $key=>$value)
                {
                    $est = new RolUsuario();
                    $est->fill(['rut' => $value->rut, 'rol_id' => $value->rol_id]);
                    $est->save();
                }
            });

            return redirect()->back()->with('estudiante_file', 'Se ha procesado correctamente el archivo');
        }
        else
        {
            return redirect()->back()->with('estudiante_file_error', 'Error. La extensión no es válida. El archivo no fue procesado');
        }
    }



}

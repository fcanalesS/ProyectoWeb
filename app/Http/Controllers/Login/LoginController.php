<?php namespace App\Http\Controllers\Login;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\RolUsuario;
use Illuminate\Http\Request;
use \Illuminate\Contracts\Auth\Guard as Auth;
use UTEM\Utils\Rut;

class LoginController extends Controller
{

    /**
     * @var Auth
     */
    protected $auth;

    public function __construct(Auth $auth)
    {
        $this->auth = $auth;
    }

    public function index()
    {
        return view('login.index');
    }

    public function postindex (Request $request)
    {
        $user_data = ['rut' => $request->input('rut'), 'password' => $request->input('password')];
        $rut = $request->input('rut');
        $rules =
            [
                'rut' => 'required',
                'password' => 'required'
            ];

        $this->validate($request, $rules);

        if($this->auth->attempt($user_data, $request->has('remember')))
        {
            $rut = $this->auth->user()->rut;

            $rol = RolUsuario::join('roles', 'roles_usuarios.rol_id', '=', 'roles.id')
                ->where('roles_usuarios.rut','=',$rut)
                ->select('roles.nombre')
                ->get();

            //dd($rol->first()->nombre);
            if($rol->first()->nombre == 'ADMINISTRADOR')
                return redirect()->route('admin.index');
            if($rol->first()->nombre == 'ENCARGADO_CAMPUS')
                return redirect()->route('encargado.index');
            if($rol->first()->nombre == 'DOCENTE')
                return redirect()->route('docente.index');
            if($rol->first()->nombre = 'ESTUDIANTE')
                return redirect()->route('estudiante.index');
        }

        return redirect()->back()->with('login_error', 'Error. Revise los datos ingresados')->withInput();
    }

    public function logout ()
    {
        $this->auth->logout();

        return redirect('/login')->with('logout', 'Ha cerrado su sesión')->withInput();
    }

}

<?php namespace App\Http\Controllers\Login;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use \Illuminate\Contracts\Auth\Guard as Auth;
use UTEM\Utils\Rut;

class LoginController extends Controller {

    /**
     * @var Auth
     */
    protected $auth;

    public function __construct(Auth $auth)
    {
        $this->auth = $auth;
    }

	public function index ()
    {
        return view('login.index');
    }

    public function postindex (Request $request)
    {
        $user_data = $request->only(['rut', 'password']);
        $rut = $request->input('rut');
        $rules =
            [
                'rut' => 'required',
                'password' => 'required'
            ];

        $this->validate($request, $rules);
        //dd($this->auth->attempt($user_data, $request->has('remember')));
        if($this->auth->attempt($user_data, $request->has('remember')))
        {
            /*
             * Si el login está correcto, determinar por rut quién es el
             * encargado de "qué" campus y mostrar los datos referentes a ese rut.
             *
             * Mismo procedimiento para los docentes y estudiantes.
             *
             * El administrador no importa.
             */
            return redirect()->route('admin.index');
        }

        return redirect()->back()->with('login_error', 'Error. Revise los datos ingresados')->withInput();
    }

    public function logout ()
    {
        $this->auth->logout();

        return redirect('/')->with('logout', 'Ha cerrado su sesión')->withInput();
    }

}

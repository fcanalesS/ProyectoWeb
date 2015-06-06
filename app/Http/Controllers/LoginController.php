<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Rol;
use App\RolUsuario;
use Illuminate\Support\Facades\Request;

class LoginController extends Controller {

	public function index()
    {
        return view('login.index');
    }

    public function postLogin()
    {

    }

    /*
    public function postLogin()
    {
        $rut_login = Request::input('rut');
        $rol_id = RolUsuario::select('rol_id')->where('rut', '=', $rut_login)->get()->toArray();

        $rol = Rol::select('nombre')->where('id', '=', $rol_id)->get();

        //echo $rol[0]['nombre'];

        //dd($rol);

        if ($rol[0]['nombre'] == 'Administrador')
            //return view('admin.index', compact('rut_login'));
            return view('admin.index', compact('rol'));
        else
            return redirect('/login');
    }
    */

}

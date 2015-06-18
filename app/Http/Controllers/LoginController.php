<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class LoginController extends Controller {

	public function index (Request $request)
    {
        $type = $request->route('id');
        return view('login.index', compact('type'));
    }

    public function postLogin (LoginRequest $request)
    {
        $rut = $request->input('rut');
        $type = $request->route('id');

        //dd($type);

        //return Redirect::intended('/admin/index');
        return redirect('admin/index/');

        /*
         *  $rol_user = RolUsuario::select('rol_id')->where('rut', '=', 16967863)->get();
            dd($rol_user->toArray());
         */
    }

    public function logout()
    {
        Auth::logout();
        return Redirect::to('/');
    }

}

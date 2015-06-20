<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\LoginRequest;
use App\RutUtils;
use App\Usuario;
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
        $user_data = ['rut' => $request->input('rut'), 'password' => $request->input('password')];

        $rut = RutUtils::rut($user_data['rut']);

        $rules = ['rut' => 'Required', 'password' => 'Required'];



        return redirect('admin/index/');
    }

    public function logout()
    {
        Auth::logout();
        return Redirect::to('/');
    }

}

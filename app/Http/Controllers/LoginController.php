<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class LoginController extends Controller {

	public function index (Request $request)
    {
        $type = $request->route('id');
        return view('login.index', compact('type'));
    }

    public function postLogin (Request $request)
    {
        $rut = $request->input('rut');
        $type = $request->route('id');

        dd(gettype($type));


        return Redirect::to('/admin/index/' . $rut);
        //return Redirect::intended('/admin/index');
        //return Redirect::to('/admin/index/' . $rut);

    }

}

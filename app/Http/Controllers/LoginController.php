<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class LoginController extends Controller {

	public function showLogin()
    {
        return view('auth.login');
    }

    public function postLogin()
    {
        echo Input::get('id');

        //return view('admin.index');
    }

}

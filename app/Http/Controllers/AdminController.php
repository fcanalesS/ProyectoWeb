<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class AdminController extends Controller {

	public function index (Request $request)
    {
        $inputs = $request->route('id');

        return view('admin.index', compact('inputs'));
    }

}

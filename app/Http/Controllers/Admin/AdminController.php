<?php namespace App\Http\Controllers\Admin;

use App\Docente;
use App\Estudiante;
use App\Funcionario;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\RolUsuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller {

	public function index ()
    {
        $rut = Auth::user()->rut;

        $estudiantes = Estudiante::all()->count();
        $funcionarios = Funcionario::all()->count();
        $docentes = Docente::all()->count();


        return view('admin.index', compact('rut', 'estudiantes', 'docentes', 'funcionarios'));
    }

}

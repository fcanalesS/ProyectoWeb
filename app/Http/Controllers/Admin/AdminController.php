<?php namespace App\Http\Controllers\Admin;

use App\Docente;
use App\Estudiante;
use App\Funcionario;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\RolUsuario;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller {

    /**
     * @var Guard
     */
    private $guard;

    public function __construct(Guard $guard)
    {
        $this->guard = $guard;

        if ($this->guard->check())
        {
            if(Docente::all()->where('rut', $this->guard->user()->rut))
                $this->datos = Docente::select('id', 'rut', 'nombres', 'apellidos')->where('rut', $this->guard->user()->rut)->get();
            elseif(Funcionario::all()->where('rut', $this->guard->user()->rut))
                $this->datos = Funcionario::select('id', 'rut', 'nombres', 'apellidos')->where('rut', $this->guard->user()->rut)->get();
            else
                $this->datos = Estudiante::select('id', 'rut', 'nombres', 'apellidos')->where('rut', $this->guard->user()->rut)->get();
        }
    }

	public function index ()
    {
        $estudiantes = Estudiante::all()->count();
        $funcionarios = Funcionario::all()->count();
        $docentes = Docente::all()->count();

        $datos = $this->datos;

        return view('admin.index', compact('rut', 'estudiantes', 'docentes', 'funcionarios', 'datos'));
    }

}

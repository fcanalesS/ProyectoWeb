<?php namespace App\Http\Controllers\Admin;

use App\Departamento;
use App\Docente;
use App\Estudiante;
use App\Facultad;
use App\Funcionario;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;

class DepartamentosController extends Controller {

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

	public function edit ($id)
    {
        $depto = Departamento::findOrFail($id);
        $f = Facultad::lists('nombre', 'id');
        $datos = $this->datos;

        return view('admin.campus.edit_d', compact('id', 'depto', 'f', 'datos'));
    }

    public function update ($id, Request $request)
    {
        $depto = Departamento::findOrFail($id);
        $depto->fill($request->all());
        $depto->save();

        return redirect()->back()->with('depto', 'Se ha actualizado correctamente el departamento');
    }

    public function store(Request $request)
    {
        $depto = new Departamento($request->all());
        $depto->save();

        return redirect()->back()->with('depto_add', 'Se ha agregado correctamente el departamento');

    }

    public function deleteDepartamento ($id, Request $request)
    {
        $depto = Departamento::findOrFail($id);
        $mensaje = 'Se ha borrado el departamento: ' . $depto->nombre;
        $depto->delete();
        if($request->ajax())
            return response()->json([
                'id'        => $depto->id,
                'message'   => $mensaje
            ]);
    }

}

<?php namespace App\Http\Controllers\Admin;

use App\Departamento;
use App\Docente;
use App\Escuela;
use App\Estudiante;
use App\Funcionario;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;

class EscuelasController extends Controller {

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
        $depto = Departamento::lists('nombre', 'id');
        $esc = Escuela::findOrFail($id);
        $datos = $this->datos;

        return view('admin.campus.edit_e', compact('id', 'esc', 'depto', 'datos'));
    }

    public function update ($id, Request $request)
    {
        $escuela = Escuela::findOrFail($id);
        $escuela->fill($request->all());
        $escuela->save();

        return redirect()->back()->with('escuela', 'Se a actualizado correctamente la escuela');
    }

    public function store (Request $request)
    {
        $escuela = new Escuela($request->all());
        $escuela->save();

        return redirect()->back()->with('escuela_add', 'Se a agregado correctamente la escuela');
    }

    public function file_escuelas (Request $request)
    {
        //dd($request->all());
        dd($request->file('office')->getMimeType());
    }

    public function deleteEscuela ($id, Request $request)
    {
        $escuela = Escuela::findOrFail($id);
        $mensaje = 'Se ha borrado el departamento: ' . $escuela->nombre;
        $escuela->delete();
        if($request->ajax())
            return response()->json([
                'id'        => $escuela->id,
                'message'   => $mensaje
            ]);
    }

}

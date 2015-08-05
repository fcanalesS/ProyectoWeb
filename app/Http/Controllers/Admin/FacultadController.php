<?php namespace App\Http\Controllers\Admin;

use App\Campus;
use App\Docente;
use App\Estudiante;
use App\Facultad;
use App\Funcionario;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;

class FacultadController extends Controller {
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
        $fac = Facultad::findOrFail($id);
        $campus = Campus::lists('nombre', 'id');
        $datos = $this->datos;

        return view ('admin.campus.edit_f', compact('id', 'fac', 'campus', 'datos'));
    }

    public function update ($id, Request $request)
    {
        $facultad = Facultad::findOrFail($request->input('id'));
        $facultad->fill($request->all());
        $facultad->save();

        return redirect()->back()->with('campus', 'Se ha actualizado correctamente el campus');
    }

    public function store(Request $request)
    {
        dd($request->all());

        $facultad = new Facultad($request->all());
        $facultad->save();

        return redirect()->back()->with('facultad_add', 'Se ha agregado correctamente la facultad');
    }

    public function deleteFacultad ($id, Request $request)
    {
        $facultad = Facultad::findOrFail($id);
        $mensaje = 'Se ha borrado la facultad: ' . $facultad->nombre;
        $facultad->delete();
        if($request->ajax())
            return response()->json([
                'id'        => $facultad->id,
                'message'   => $mensaje
            ]);
    }

}

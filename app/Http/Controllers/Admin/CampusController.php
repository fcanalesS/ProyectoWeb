<?php namespace App\Http\Controllers\Admin;

use App\Campus;
use App\Departamento;
use App\Docente;
use App\Escuela;
use App\Estudiante;
use App\Facultad;
use App\Funcionario;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;
use Toin0u\Geocoder\Facade\Geocoder;
use UTEM\Utils\Rut;

class CampusController extends Controller {

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
        $datos = $this->datos;

        $campus = Campus::all();
        $facultades = Facultad::select('id', 'nombre', 'campus_id', 'descripcion')
            ->with('campus')
            ->orderBy('campus_id')
            ->get();

        $deptos = Departamento::select('id', 'nombre', 'facultad_id', 'descripcion')
            ->with('dep_facultades')
            ->orderBy('facultad_id')
            ->get();

        $escuelas = Escuela::select('id', 'nombre', 'departamento_id', 'descripcion')
            ->with('escuela_departamento')
            ->get();

        $c_lists = Campus::lists('nombre', 'id');
        $f_lists = Facultad::lists('nombre', 'id');
        $d_lists = Departamento::lists('nombre', 'id');

        return view('admin.campus.index', compact('campus', 'facultades', 'deptos', 'escuelas',
            'c_lists', 'd_lists', 'f_lists', 'datos'));
    }

    public function edit ($id)
    {
        $campus= Campus::findOrFail($id);
        $datos = $this->datos;

        return view('admin.campus.edit', compact('campus', 'id', 'datos'));
    }

    public function store (Request $request)
    {
        if (Rut::isRut($request->input('rut_encargado')) != false)
        {
            try
            {
                $geocode = Geocoder::geocode($request->input('direccion'));
                $datos_c = ['nombre' => $request->input('nombre'), 'direccion' => $request->input('direccion'),
                    'latitud' => $geocode['latitude'], 'longitud' => $geocode['longitude'],
                    'descripcion' => $request->input('descripcion'), 'rut_encargado' => $request->input('rut_encargado')];

                $campus = new Campus($datos_c);
                $campus->save();

                return redirect()->back()->with('campus_add', 'Se a agregado correctamente el campus');
            }
            catch(\Exception $e)
            {
                return redirect()->back()->withInput()
                    ->with('error_direccion', 'Error al ingresar la dirección. Tiene que ser de la forma: "Calle Número, comuna"');
            }
        }
        else
            return redirect()->back()->withInput()
                ->with('error_rut', 'Error. El rut ingresado no es válido');
    }

    public function update ($id, Request $request)
    {
        //dd($request->all());
        try
        {
            $geocode = Geocoder::geocode($request->input('direccion'));
            $c_data = ['nombre' => $request->input('nombre'), 'direccion' => $request->input('direccion'),
                'latitud' => $geocode['latitude'], 'longitud' => $geocode['longitude'], 'descripcion' => $request->input('descripcion')];

            $campus = Campus::findOrFail($id);
            $campus->fill($c_data);
            $campus->save();

            return redirect()->back()->with('campus', 'Se ha actualizado correctamente el campus');
        }
        catch(\Exception $e)
        {
            dd($e->getMessage());
        }
    }

    public function deleteCampus ($id, Request $request)
    {
        $campus = Campus::findOrFail($id);
        $mensaje = 'Se ha borrado el campus: ' . $campus->nombre;
        $campus->delete();
        if($request->ajax())
            return response()->json([
                'id'        => $campus->id,
                'message'   => $mensaje
            ]);
    }

}

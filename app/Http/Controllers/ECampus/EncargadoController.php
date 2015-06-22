<?php namespace App\Http\Controllers\ECampus;

use App\Campus;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Sala;
use App\TipoSala;
use Illuminate\Http\Request;

class EncargadoController extends Controller {

	public function index()
    {
        $datos_salas = Sala::select('id', 'campus_id', 'tipo_sala_id', 'nombre', 'descripcion')
                                ->with('sala_campus')
                                ->with('sala_tipoS')->get();
        $tipo_sala = TipoSala::lists('nombre', 'id');
        $campus_sala = Campus::lists('nombre', 'id');

        //dd($tipo_sala);

        return view('encargado.index', compact('datos_salas', 'tipo_sala', 'campus_sala'));
    }

}

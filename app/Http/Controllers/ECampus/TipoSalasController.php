<?php namespace App\Http\Controllers\ECampus;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\TipoSala;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class TipoSalasController extends Controller {

	public function store(Request $request)
    {
        $tipoS = new TipoSala($request->all());
        $tipoS->save();

        Session::flash('tipo_add', 'Agregado ' . $request->input('nombre') . 'como tipo de sala');

        return redirect()->back();
    }

    public function edit($id)
    {
        $tipo_sala = TipoSala::findOrFail($id);

        return view('encargado.tiposala.edit', compact('tipo_sala', 'id'));
    }

    public function update($id, Request $request)
    {
        $tipo_sala = TipoSala::findOrFail($id);
        $tipo_sala->fill($request->all());
        $tipo_sala->save();

        return redirect('encargado/salas')->with('tipo_update', 'El tipo de la sala fue actualizado');

        dd($request->all());
    }

}

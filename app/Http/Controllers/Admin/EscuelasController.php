<?php namespace App\Http\Controllers\Admin;

use App\Departamento;
use App\Escuela;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class EscuelasController extends Controller {

	public function edit ($id)
    {
        $depto = Departamento::lists('nombre', 'id');
        $esc = Escuela::findOrFail($id);

        return view('admin.campus.edit_e', compact('id', 'esc', 'depto'));
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

}

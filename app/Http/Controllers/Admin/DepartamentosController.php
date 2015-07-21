<?php namespace App\Http\Controllers\Admin;

use App\Departamento;
use App\Facultad;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class DepartamentosController extends Controller {

	public function edit ($id)
    {
        $depto = Departamento::findOrFail($id);
        $f = Facultad::lists('nombre', 'id');

        return view('admin.campus.edit_d', compact('id', 'depto', 'f'));
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

}

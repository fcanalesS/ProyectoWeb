<?php namespace App\Http\Controllers\Admin;

use App\Campus;
use App\Facultad;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class FacultadController extends Controller {

	public function edit ($id)
    {
        $fac = Facultad::findOrFail($id);
        $campus = Campus::lists('nombre', 'id');

        return view ('admin.campus.edit_f', compact('id', 'fac', 'campus'));
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
        $facultad = new Facultad($request->all());
        $facultad->save();

        return redirect()->back()->with('facultad_add', 'Se ha agregado correctamente la facultad');
    }

}

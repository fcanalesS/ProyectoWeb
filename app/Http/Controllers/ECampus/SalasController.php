<?php namespace App\Http\Controllers\ECampus;

use App\Campus;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Sala;
use App\TipoSala;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SalasController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('encargado.salas.index');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
	public function store(Request $request)
	{
        $inputs = $request->all();

        $sala = new Sala($inputs);
        $sala->save();

        Session::flash('add_sala', 'Se ha agregado la sala ' . $request->input('nombre'));

        return redirect()->back();
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        $sala = Sala::findOrFail($id);
        $tipo_s = TipoSala::lists('nombre', 'id');
        $campus = Campus::select('nombre', 'id')->where('id', $sala->campus_id)->get();

        //dd($campus[0]->id);

        return view('encargado.salas.edit', compact('sala', 'tipo_s', 'campus', 'id'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, Request $request)
	{
		dd($request->all());
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}

<?php namespace App\Http\Controllers\ECampus;

use App\Asignatura;
use App\Curso;
use App\Horario;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Periodo;
use App\Sala;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AsignarController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $horarios = Horario::select('id', 'fecha', 'sala_id', 'periodo_id', 'curso_id')
                        ->with('horario_sala', 'horario_periodo', 'horario_curso')
                        ->get();

        $periodos = Periodo::lists('bloque', 'id');
        $asignaturas = Asignatura::lists('nombre', 'id');
        $salas = Sala::lists('nombre', 'id');

		return view('encargado.asignar.index', compact('horarios', 'periodos', 'asignaturas', 'salas'));
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
        $horario = new Horario($request->all());
        $horario->save();

        Session::flash('add_horario', 'Horario asignado correctamente');

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
        $horario = Horario::findOrFail($id);
        $sala = Sala::findOrFail($horario->sala_id);

        $periodo = Periodo::lists('bloque', 'id');
        $asignatura = Asignatura::lists('nombre', 'id');




        return view('encargado.asignar.edit', compact('id', 'horario', 'sala', 'periodo', 'asignatura'));
	}

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @param Request $request
     * @return Response
     */
	public function update($id, Request $request)
	{
        $horario = Horario::findOrFail($id);
        $horario->fill($request->all());
        $horario->save();

        return redirect('encargado/asignar')->with('re_sala', 'Se ha reasignado exitosamente la sala ' . $request->input('nombre'));
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

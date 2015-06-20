<?php namespace App\Http\Controllers\Admini;

use App\Campus;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CampusController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $campus = Campus::all();
		return view('admin.campus.index', compact('campus'));
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

        $campus = new Campus($inputs);
        $campus->save();

        Session::flash('message', 'Creado campus' . $request->input('nombre'));

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

		$campus = Campus::findOrFail($id);

        return view('admin.campus.edit', compact('campus', 'id'));
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
        $campus = Campus::findOrFail($id);

        $campus->fill($request->all());
        $campus->save();


        return redirect('admin/campus')->with('message_1', 'El campus ' . $request->input('nombre') . ' fue actualizado');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @param Request $request
     * @return Response
     */
	public function destroy($id, Request $request)
	{
        Campus::destroy($id);

        return redirect('admin/campus')->with('delete_message', 'el campus ' . $request->input('nombre') . ' fue eliminado');
	}

}

<?php namespace App\Http\Controllers\EncargadoCampus;

use App\Campus;
use App\Curso;
use App\Horario;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Periodo;
use App\Sala;
use App\TipoSala;
use Illuminate\Http\Request;

class SalasController extends Controller {

	public function index ()
    {
        $salas = Sala::select()
            ->with('sala_campus', 'sala_tipoS')
            ->get();

        $h_salas = \DB::table('horarios')
            ->join('salas', 'horarios.sala_id', '=', 'salas.id')
            ->join('periodos', 'horarios.periodo_id', '=', 'periodos.id')->orderBy('periodos.bloque')
            ->join('cursos', 'horarios.curso_id', '=', 'cursos.id')
            ->join('asignaturas', 'cursos.asignatura_id', '=', 'asignaturas.id')
            ->join('docentes', 'cursos.docente_id', '=', 'docentes.id')
            ->join('campus', 'salas.campus_id', '=', 'campus.id')
            ->select('horarios.id', 'horarios.fecha', 'salas.nombre as sala', 'asignaturas.nombre as asig', 'docentes.nombres', 'docentes.apellidos',
                'cursos.semestre', 'cursos.anio', 'cursos.seccion', 'campus.nombre as campus')
            ->get();

        $campus = Campus::lists('nombre', 'id');
        $tiposala = TipoSala::lists('nombre', 'id');

        return view('encargado.salas.index', compact('rut', 'salas', 'h_salas', 'campus', 'tiposala'));
    }

    public function salaAdd (Request $request)
    {
        $salas = new Sala($request->all());
        $salas->save();

        return redirect()->back()->with('sala_add', 'Se ha agregado correctamente la sala');
    }

    public function salaEdit ($id)
    {
        $sala = Sala::findOrFail($id);

        $campus = Campus::lists('nombre', 'id');
        $tiposala = TipoSala::lists('nombre', 'id');
        $periodos = Periodo::all();

        $cursos = \DB::table('cursos')
            ->join('asignaturas', 'cursos.asignatura_id', '=', 'asignaturas.id')
            ->join('docentes', 'cursos.docente_id', '=', 'docentes.id')
            ->select('cursos.id','cursos.semestre', 'cursos.anio', 'cursos.seccion', 'docentes.nombres', 'docentes.apellidos', 'asignaturas.nombre as asig')
            ->orderBy('cursos.seccion')
            ->get();

        return view('encargado.salas.edit_s', compact('id', 'campus', 'tiposala', 'sala', 'periodos', 'cursos'));
    }

    public function salasAddCurso(Request $request)
    {
        $horario = new Horario($request->all());
        $horario->save();

        return redirect()->back()->with('horario_add', 'Se ha agregado correctamente el horario');
    }

    public function salaUpdate (Request $request)
    {
        $sala = Sala::findOrFail($request->input('id'));
        $sala->fill($request->all());
        $sala->save();

        return redirect()->back()->with('sala_update', 'Se ha actualizado correctamente la sala');
    }

    public function salaDelete ($id, Request $request)
    {
        $sala = Sala::findOrFail($id);
        $mensaje = 'Se ha borrado la sala: ' . $sala->nombre;
        $sala->delete();
        if($request->ajax())
            return response()->json([
                'id'        => $sala->id,
                'message'   => $mensaje
            ]);
    }

    public function horarioDelete($id, Request $request)
    {
        $hsala = Horario::findOrFail($id);
        $mensaje = 'Se ha eliminado la sala correspondiente al dia: ' . $hsala->fecha;
        $hsala->delete();
        if($request->ajax())
            return response()->json([
                'id'        => $hsala->id,
                'message'   => $mensaje
            ]);
    }

    public function salaArchivo (Request $request)
    {
        $file = $request->file('file');

        //dd($file->getClientOriginalExtension());

        if ($file->getClientOriginalExtension() == 'xls' || $file->getClientOriginalExtension() == 'xlsx')
        {
            $nombre = $file->getClientOriginalName();
            Storage::disk('local')->put($nombre, \File::get($file));

            Excel::load('/public/storage/'.$nombre, function($file)
            {
                $r = $file->get();
                foreach($r as $key=>$value)
                {
                    $sala = new Sala();
                    $sala->fill(['campus_id' => $value->campus_id, 'tipo_sala_id' => $value->tipo_sala_id,
                        'nombre' => $value->nombre, 'descripcion' => $value->descripcion]);
                    $sala->save();
                }
            });
            Storage::delete($file->getClientOriginalName());

            return redirect()->back()->with('sala_file', 'Se ha procesado correctamente el archivo');
        }
        else
        {
            return redirect()->back()->with('sala_file_error', 'Error. La extensión no es válida. El archivo no fue procesado');
        }
    }

}

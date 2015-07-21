<?php namespace App\Http\Controllers\EncargadoCampus;

use App\Asignatura;
use App\Carrera;
use App\Curso;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class ArchivosController extends Controller {

	public function carreraArchivo (Request $request)
    {
        $file = $request->file('file');

        if ($file->getClientOriginalExtension() == 'xls' || $file->getClientOriginalExtension() == 'xlsx')
        {
            $nombre = $file->getClientOriginalName();
            Storage::disk('local')->put($nombre, \File::get($file));

            Excel::load('/public/storage/'.$nombre, function($file)
            {
                $r = $file->get();
                foreach($r as $key=>$value)
                {
                    $car = new Carrera();
                    $car->fill(['escuela_id' => $value->escuela_id, 'codigo' => $value->codigo,
                        'nombre' => $value->nombre, 'descripcion' => $value->descripcion]);
                    $car->save();
                }
            });
            Storage::delete($file->getClientOriginalName());

            return redirect()->back()->with('carrera_file', 'Se ha procesado correctamente el archivo');
        }
        else
        {
            return redirect()->back()->with('carrera_file_error', 'Error. La extensión no es válida. El archivo no fue procesado');
        }
    }

    public function asignaturaArchivo (Request $request)
    {
        $file = $request->file('file');

        if ($file->getClientOriginalExtension() == 'xls' || $file->getClientOriginalExtension() == 'xlsx')
        {
            $nombre = $file->getClientOriginalName();
            Storage::disk('local')->put($nombre, \File::get($file));

            Excel::load('/public/storage/'.$nombre, function($file)
            {
                $r = $file->get();
                foreach($r as $key=>$value)
                {
                    $asi = new Asignatura();
                    $asi->fill(['departamento_id' => $value->departamento_id, 'codigo' => $value->codigo,
                        'nombre' => $value->nombre, 'descripcion' => $value->descripcion]);
                    $asi->save();
                }
            });
            Storage::delete($file->getClientOriginalName());

            return redirect()->back()->with('asignatura_file', 'Se ha procesado correctamente el archivo');
        }
        else
        {
            return redirect()->back()->with('asignatura_file_error', 'Error. La extensión no es válida. El archivo no fue procesado');
        }
    }

    public function cursoArchivo (Request $request)
    {
        $file = $request->file('file');

        if ($file->getClientOriginalExtension() == 'xls' || $file->getClientOriginalExtension() == 'xlsx')
        {
            $nombre = $file->getClientOriginalName();
            Storage::disk('local')->put($nombre, \File::get($file));

            Excel::load('/public/storage/'.$nombre, function($file)
            {
                $r = $file->get();
                foreach($r as $key=>$value)
                {
                    $cur = new Curso();
                    $cur->fill(['asignatura_id' => $value->asignatura_id, 'docente_id' => $value->docente_id,
                        'semestre' => $value->semestre, 'anio' => $value->anio, 'seccion' => $value->seccion]);
                    $cur->save();
                }
            });
            Storage::delete($file->getClientOriginalName());

            return redirect()->back()->with('curso_file', 'Se ha procesado correctamente el archivo');
        }
        else
        {
            return redirect()->back()->with('curso_file_error', 'Error. La extensión no es válida. El archivo no fue procesado');
        }
    }

}

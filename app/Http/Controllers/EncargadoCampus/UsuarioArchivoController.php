<?php namespace App\Http\Controllers\EncargadoCampus;

use App\Docente;
use App\Estudiante;
use App\Funcionario;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class UsuarioArchivoController extends Controller {

	public function archivosEstudiantes (Request $request)
	{
		$file = $request->file('file');

        if ($file->getClientOriginalExtension() == 'xls' || $file->getClientOriginalExtension() == 'xlsx')
        {
            $nombre = $file->getClientOriginalName();
            \Storage::disk('local')->put($nombre, \File::get($file));

            Excel::load('/public/storage/'.$nombre, function($file)
            {
                $r = $file->get();
                foreach($r as $key=>$value)
                {
                    $est = new Estudiante();
                    $est->fill(['carrera_id' => $value->carrera_id, 'rut' => $value->rut, 'nombres' => $value->nombres,
                        'apellidos' => $value->apellidos, 'email' => $value->email]);
                    $est->save();
                }
            });
            Storage::delete($file->getClientOriginalName());

            return redirect()->back()->with('estudiante_file', 'Se ha procesado correctamente el archivo');
        }
       else
       {
            return redirect()->back()->with('estudiante_file_error', 'Error. La extensión no es válida. El archivo no fue procesado');
       }
	}

    public function archivosDocentes (Request $request)
    {
        $file = $request->file('file');

        if ($file->getClientOriginalExtension() == 'xls' || $file->getClientOriginalExtension() == 'xlsx')
        {
            $nombre = $file->getClientOriginalName();
            \Storage::disk('local')->put($nombre, \File::get($file));

            //$depto_id = $request->get('depto_id');
            Excel::load('/public/storage/'.$nombre, function($file)
            {
                $r = $file->get();
                foreach($r as $key=>$value)
                {
                    $doc = new Docente();
                    $doc->fill(['departamento_id' => $value->departamento, 'rut' => $value->rut, 'nombres' => $value->nombres,
                        'apellidos' => $value->apellidos]);
                    $doc->save();
                }
            });
            Storage::delete($file->getClientOriginalName());

            return redirect()->back()->with('docente_file', 'Se ha procesado correctamente el archivo');
        }
        else
        {
            return redirect()->back()->with('docente_file_error', 'Error. La extensión no es válida. El archivo no fue procesado');
        }
    }

    public function archivosFuncionarios (Request $request)
    {
        $file = $request->file('file');

        if ($file->getClientOriginalExtension() == 'xls' || $file->getClientOriginalExtension() == 'xlsx')
        {
            $nombre = $file->getClientOriginalName();
            \Storage::disk('local')->put($nombre, \File::get($file));

            Excel::load('/public/storage/'.$nombre, function($file)
            {
                $r = $file->get();
                foreach($r as $key=>$value)
                {
                    $fun = new Funcionario();
                    $fun->fill(['departamento_id' => $value->departamento, 'rut' => $value->rut, 'nombres' => $value->nombres,
                        'apellidos' => $value->apellidos]);
                    $fun->save();
                }
            });
            Storage::delete($file->getClientOriginalName());

            return redirect()->back()->with('funcionario_file', 'Se ha procesado correctamente el archivo');
        }
        else
        {
            return redirect()->back()->with('funcionario_file_error', 'Error. La extensión no es válida. El archivo no fue procesado');
        }
    }


}

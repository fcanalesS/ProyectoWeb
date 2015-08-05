<?php namespace App\Http\Controllers\EncargadoCampus;

use App\Docente;
use App\Estudiante;
use App\Funcionario;
use App\Helpers\PersonasUtils;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use UTEM\Utils\Rut;

class PersonasController extends Controller {

    /* Estudiantes */
    public function updateEstudiante ($id, Request $request)
    {
        $estudiante = Estudiante::findOrFail($id);
        $estudiante->fill($request->all());
        $estudiante->save();

        return redirect()->back()->with('estudiante_update', 'Se ha actualizado correctamente el estudiante');
    }

    public function addEstudiante(Request $request)
    {
        $rut = PersonasUtils::Rut($request->input('rut_num'), $request->input('dig_veri'));

        if (Rut::isRut($rut))
        {
            $nombres = $request->input('first_name'). ' '. $request->input('second_name');
            $apellidos = $request->input('apellido_p'). ' '. $request->input('apellido_m');

            $datos_e = ['carrera_id' => $request->input('carrera_id'), 'rut' => $request->input('rut_num'), 'nombres' => $nombres,
                'apellidos' => $apellidos, 'email' => $request->input('email')];

            $estudiante = new Estudiante($datos_e);
            $estudiante->save();

            return redirect()->back()->with('estudiante_add', 'Se ha agregado correctamente el estudiante');
        }
        else
        {
            return redirect()->back()->with('estudiante_error', 'El rut ingresado no es válido. Intente nuevamente')->withInput();
        }

    }

    /*++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
     *++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
     +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++*/

    /* Docentes */
    public function updatedocente($id, Request $request)
    {
        $docente = Docente::findOrFail($id);
        $docente->fill($request->all());
        $docente->save();

        return redirect()->back()->with('docente_update', 'Se ha actualizado correctamente el docente');
    }

    public function addDocente(Request $request)
    {
        $rut = PersonasUtils::Rut($request->input('rut_num'), $request->input('dig_veri'));

        if (Rut::isRut($rut))
        {
            $nombres = PersonasUtils::Nombres($request->input('first_name'), $request->input('second_name'));
            $apellidos = PersonasUtils::Nombres($request->input('apellido_p'), $request->input('apellido_m'));

            $datos_d = ['departamento_id' => $request->input('departamento_id'), 'rut' => $request->input('rut_num'), 'nombres' => $nombres,
                'apellidos' => $apellidos];

            $docente = new Docente($datos_d);
            $docente->save();

            return redirect()->back()->with('docente_add', 'Se ha agregado correctamente el docente');
        }
        else
        {
            return redirect()->back()->with('docente_error', 'El rut ingresado no es válido. Intente nuevamente')->withInput();
        }
    }
    /*++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
     *++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
     +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++*/

    /* Funcionarios */
    public function updateFuncionario($id, Request $request)
    {
        $funcionario = Funcionario::findOrFail($id);
        $funcionario->fill($request->all());
        $funcionario->save();

        return redirect()->back()->with('funcionario_update', 'Se ha actualizado correctamente el funcionario');
    }

    public function addFuncionario(Request $request)
    {
        $rut = PersonasUtils::Rut($request->input('rut_num'), $request->input('dig_veri'));

        if (Rut::isRut($rut))
        {
            $nombres = PersonasUtils::Nombres($request->input('first_name'), $request->input('second_name'));
            $apellidos = PersonasUtils::Nombres($request->input('apellido_p'), $request->input('apellido_m'));

            $datos_f = ['departamento_id' => $request->input('departamento_id'), 'rut' => $request->input('rut_num'), 'nombres' => $nombres,
                'apellidos' => $apellidos];

            $funcionario = new Funcionario($datos_f);
            $funcionario->save();

            return redirect()->back()->with('funcionario_add', 'Se ha agregado correctamente el docente');
        }
        else
        {
            return redirect()->back()->with('funcionario_error', 'El rut ingresado no es válido. Intente nuevamente')->withInput();
        }
    }

    /*++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
     *++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
     +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++*/

    public function deleteFuncionario ($id, Request $request)
    {
        $funcionario = Funcionario::findOrFail($id);
        $mensaje = 'Se ha borrado el funcionario: ' . $funcionario->nombres .' '. $funcionario->apellidos;
        $funcionario->delete();
        if($request->ajax())
            return response()->json([
                'id'        => $funcionario->id,
                'message'   => $mensaje
            ]);
    }

    public function deleteDocente ($id, Request $request)
    {
        $docente = Docente::findOrFail($id);
        $mensaje = 'Se ha borrado el docente: ' . $docente->nombres .' '. $docente->apellidos;
        $docente->delete();
        if($request->ajax())
            return response()->json([
                'id'        => $docente->id,
                'message'   => $mensaje
            ]);
    }

    public function deleteEstudiante ($id, Request $request)
    {
        $estudiante = Estudiante::findOrFail($id);
        $mensaje = 'Se ha borrado el estudiante: ' . $estudiante->nombres .' '. $estudiante->apellidos;
        $estudiante->delete();
        if($request->ajax())
            return response()->json([
                'id'        => $estudiante->id,
                'message'   => $mensaje
            ]);
    }
}

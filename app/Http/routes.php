<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function()
{
    return redirect()->route('login.index');
});

Route::group(['namespace' => 'Login'], function() {
    Route::get('/login', ['as' => 'login.index', 'uses' => 'LoginController@index']);
    Route::post('/login', ['as' => 'login.post', 'uses' => 'LoginController@postindex']);
    Route::get('/logout', ['as' => 'login.logout', 'uses' => 'LoginController@logout']);
});

Route::group(['middleware' => ['auth', 'is_admin'], 'prefix' => 'admin', 'namespace' => 'Admin'], function() {
    Route::get('/inicio', ['as' => 'admin.index', 'uses' => 'AdminController@index']);
    Route::group(['prefix' => 'usuarios'], function () {
        Route::get('/', ['as' => 'admin.usuarios.index', 'uses' => 'UsuariosController@index']);
        Route::get('/editar/{id}/funcionarios', ['as' => 'admin.usuarios.edit_func', 'uses' => 'UsuariosController@edit']);
        Route::put('/actualizar/{id}/funcionarios', ['as' => 'admin.usuarios.update', 'uses' => 'UsuariosController@update']);
        Route::get('/editar/{id}/docentes', ['as' => 'admin.usuarios.edit_doc', 'uses' => 'UsuariosController@edit']);
        Route::put('/actualizar/{id}/docentes', ['as' => 'admin.usuarios.update', 'uses' => 'UsuariosController@update']);
        Route::get('/editar/{id}/estudiantes', ['as' => 'admin.usuarios.edit_est', 'uses' => 'UsuariosController@edit']);
        Route::put('/actualizar/{id}/estudiantes', ['as' => 'admin.usuarios.update', 'uses' => 'UsuariosController@update']);
        Route::delete('/borrar/funcionario/{id}', ['as' => 'admin.funcionario.delete', 'uses' => 'UsuariosController@deleteFuncionario']);
        Route::delete('/borrar/docente/{id}', ['as' => 'admin.docente.delete', 'uses' => 'UsuariosController@deleteDocente']);
        Route::delete('/borrar/estudiante/{id}', ['as' => 'admin.estudiante.delete', 'uses' => 'UsuariosController@deleteEstudiante']);

    });
    Route::group(['prefix' => 'guardar'], function () {
        Route::post('/archivo/funcionario/', ['as' => 'rol.archivo.funcionario', 'uses' => 'UsuariosController@rolesFuncionariosArchivos']);
        Route::post('/archivo/docente/', ['as' => 'rol.archivo.docente', 'uses' => 'UsuariosController@rolesDocentesArchivos']);
        Route::post('/archivo/estudiante/', ['as' => 'rol.archivo.estudiante', 'uses' => 'UsuariosController@rolesEstudiantesArchivos']);
    });
    Route::group(['prefix' => 'campus'], function () {
        Route::get('/', ['as' => 'admin.campus.index', 'uses' => 'CampusController@index']);
        Route::post('/guardar', ['as' => 'admin.campus.store', 'uses' => 'CampusController@store']);
        Route::get('/editar/{id}', ['as' => 'admin.campus.edit_campus', 'uses' => 'CampusController@edit']);
        Route::put('/actualizar/{id}', ['as' => 'admin.campus.update_campus', 'uses' => 'CampusController@update']);
        Route::delete('/borrar/campus/{id}', ['as' => 'admin.campus.delete', 'uses' => 'CampusController@deleteCampus']);
    });
    Route::group(['prefix' => 'facultad'], function () {
        Route::get('/editar/{id}', ['as' => 'admin.campus.edit_f', 'uses' => 'FacultadController@edit']);
        Route::post('/guardar', ['as' => 'admin.campus.store_f', 'uses' => 'FacultadController@store']);
        Route::put('/actualizar/{id}', ['as' => 'admin.campus.update_f', 'uses' => 'FacultadController@update']);
        Route::delete('/borrar/facultad/{id}', ['as' => 'admin.facultad.delete', 'uses' => 'FacultadController@deleteFacultad']);
    });
    Route::group(['prefix' => 'departamento'], function () {
        Route::get('/editar/{id}', ['as' => 'admin.campus.edit_d', 'uses' => 'DepartamentosController@edit']);
        Route::post('/guardar', ['as' => 'admin.campus.store_d', 'uses' => 'DepartamentosController@store']);
        Route::put('/actualizar/{id}', ['as' => 'admin.campus.update_d', 'uses' => 'DepartamentosController@update']);
        Route::delete('/borrar/departamento/{id}', ['as' => 'admin.departamentos.delete', 'uses' => 'DepartamentosController@deleteDepartamento']);
    });
    Route::group(['prefix' => 'escuela'], function () {
        Route::get('/editar/{id}', ['as' => 'admin.campus.edit_e', 'uses' => 'EscuelasController@edit']);
        Route::post('/guardar', ['as' => 'admin.campus.store_e', 'uses' => 'EscuelasController@store']);
        Route::post('/guardar/archivo', ['as' => 'admin.campus.file_e', 'uses' => 'EscuelasController@file_escuelas']);
        Route::put('/actualizar/{id}', ['as' => 'admin.campus.update_e', 'uses' => 'EscuelasController@update']);
        Route::delete('/borrar/escuela/{id}', ['as' => 'admin.escuelas.delete', 'uses' => 'EscuelasController@deleteEscuela']);
    });
});

Route::group(['middleware' => ['auth', 'is_encargado'],'prefix' => 'encargado', 'namespace' => 'EncargadoCampus'], function () {
    Route::get('/inicio/', ['as' => 'encargado.index', 'uses' => 'EncargadoController@index']);
    Route::get('/personas/', ['as' => 'encargado.personas.index', 'uses' => 'EncargadoController@index_personas']);

    Route::get('/editar/estudiante/{id}', ['as' => 'encargado.estudiante.editar', 'uses' => 'EncargadoController@editEstudiante']);
    Route::post('/guardar/estudiante', ['as' => 'encargado.add.estudiante', 'uses' => 'PersonasController@addEstudiante']);
    Route::put('/actualizar/estudiante/{id}', ['as' => 'encargado.estudiante.update', 'uses' => 'PersonasController@updateEstudiante']);
    Route::post('/guardar/archivo/estudiante/', ['as' => 'encargado.archivo.estudiante', 'uses' => 'UsuarioArchivoController@archivosEstudiantes']);
    Route::post('/guardar/asignatura-cursada', ['as' => 'encargado.estudiante.ac', 'uses' => 'EncargadoController@a_cEstudiante']);
    Route::delete('/borrar/estudiante/{id}', ['as' => 'encargado.estudiante.delete', 'uses' => 'PersonasController@deleteEstudiante']);

    Route::get('/editar/docente/{id}', ['as' => 'encargado.docente.editar', 'uses' => 'EncargadoController@editDocente']);
    Route::post('/guardar/docente', ['as' => 'encargado.add.docente', 'uses' => 'PersonasController@addDocente']);
    Route::put('/actualizar/docente/{id}', ['as' => 'encargado.docente.update', 'uses' => 'PersonasController@updateDocente']);
    Route::post('/guardar/archivo/docente/', ['as' => 'encargado.archivo.docente', 'uses' => 'UsuarioArchivoController@archivosDocentes']);
    Route::delete('/borrar/docente/{id}', ['as' => 'encargado.docente.delete', 'uses' => 'PersonasController@deleteDocente']);

    Route::get('/editar/funcionario/{id}', ['as' => 'encargado.funcionario.editar', 'uses' => 'EncargadoController@editFuncionario']);
    Route::post('/guardar/funcionario', ['as' => 'encargado.add.funcionario', 'uses' => 'PersonasController@addFuncionario']);
    Route::put('/actualizar/funcionario/{id}', ['as' => 'encargado.funcionario.update', 'uses' => 'PersonasController@updateFuncionario']);
    Route::post('/guardar/archivo/funcionario/', ['as' => 'encargado.archivo.funcionario', 'uses' => 'UsuarioArchivoController@archivosFuncionarios']);
    Route::delete('/borrar/funcionario/{id}', ['as' => 'encargado.funcionario.delete', 'uses' => 'PersonasController@deleteFuncionario']);


    Route::get('/academicos', ['as' => 'encargado.academicas.index', 'uses' => 'AcademicosController@index']);

    Route::post('/academicos/guardar/carrera', ['as' => 'encargado.add.carrera', 'uses' => 'AcademicosController@storeCarreras']);
    Route::get('/academicos/editar/carrera/{id}', ['as' => 'encargado.academicos.edit_carrera', 'uses' => 'AcademicosController@editCarreras']);
    Route::put('/actualizar/carrera/', ['as' => 'encargado.actualizar.carrera', 'uses' => 'AcademicosController@updateCarreras']);
    Route::post('/academicos/archivo/carrera', ['as' => 'encargado.archivo.carrera', 'uses' => 'ArchivosController@carreraArchivo']);

    Route::post('/academicos/guardar/asignatura', ['as' => 'encargado.add.asignatura', 'uses' => 'AcademicosController@storeAsignatura']);
    Route::get('/academicos/editar/asignatura/{id}', ['as' => 'encargado.academicos.edit_asignatura', 'uses' => 'AcademicosController@editAsignatura']);
    Route::put('/actualizar/asignatura/', ['as' => 'encargado.actualizar.asignatura', 'uses' => 'AcademicosController@updateAsignatura']);
    Route::post('/academicos/archivo/asignatura', ['as' => 'encargado.archivo.asignatura', 'uses' => 'ArchivosController@asignaturaArchivo']);

    Route::post('/academicos/guardar/curso', ['as' => 'encargado.add.curso', 'uses' => 'AcademicosController@storeCurso']);
    Route::get('/academicos/editar/curso/{id}', ['as' => 'encargado.academicos.edit_curso', 'uses' => 'AcademicosController@editCurso']);
    Route::put('/actualizar/curso/', ['as' => 'encargado.actualizar.curso', 'uses' => 'AcademicosController@updateCurso']);
    Route::post('/academicos/archivo/curso', ['as' => 'encargado.archivo.curso', 'uses' => 'ArchivosController@cursoArchivo']);

    Route::delete('/borrar/carrera/{id}', ['as' => 'encargado.carrera.delete', 'uses' => 'AcademicosController@deleteCarrera']);
    Route::delete('/borrar/asignatura/{id}', ['as' => 'encargado.asignatura.delete', 'uses' => 'AcademicosController@deleteAsignatura']);
    Route::delete('/borrar/curso/{id}', ['as' => 'encargado.curso.delete', 'uses' => 'AcademicosController@deleteCurso']);

    Route::group(['prefix' => 'salas'], function() {
        Route::get('/inicio', ['as' => 'encargado.salas.index', 'uses' => 'SalasController@index']);
        Route::post('/guardar', ['as' => 'encargado.add.sala', 'uses' => 'SalasController@salaAdd']);
        Route::get('/editar/{id}', ['as' => 'encargado.edit.sala', 'uses' => 'SalasController@salaEdit']);
        Route::put('/actualizar/', ['as' => 'encargado.update.sala', 'uses' => 'SalasController@salaUpdate']);
        Route::post('/curso', ['as' => 'encargado.add.sala_curso', 'uses' => 'SalasController@salasAddCurso']);
        Route::delete('/borrar/{id}', ['as' => 'encargado.salas.delete', 'uses' => 'SalasController@salaDelete']);
        Route::delete('/borrar/horario/{id}', ['as' => 'encargado.hsalas.delete', 'uses' => 'SalasController@horarioDelete']);
        Route::post('/archivos', ['as' => 'encargado.archivo.salas', 'uses' => 'SalasController@salaArchivo']);
    });
});


Route::group(['middleware' => ['auth'], 'prefix' => 'estudiante', 'namespace' => 'Estudiante'], function () {
    Route::get('/inicio', ['as' => 'estudiante.index', 'uses' => 'EstudianteController@index']);
    Route::get('/horario/', ['as' => 'estudiante.horario', 'uses' => 'EstudianteController@horarioEstudiante']);
    Route::post('/resultado/horarios/', ['as' => 'estudiante.resultado.salas', 'uses' => 'EstudianteController@consultaEstudiante']);
});

Route::group(['middleware' => ['auth', 'isdocente'], 'prefix' => 'docente', 'namespace' => 'Docente'], function () {
    Route::get('/inicio/', ['as' => 'docente.index', 'uses' => 'DocenteController@index']);
    Route::get('/horario', ['as' => 'docente.horario', 'uses' => 'DocenteController@revisarHorario']);
    Route::post('/resultado/horarios/', ['as' => 'docente.resultado.salas', 'uses' => 'DocenteController@consultaDocente']);
});